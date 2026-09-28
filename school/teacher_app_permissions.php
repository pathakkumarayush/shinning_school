<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 0);
error_reporting(E_ALL);
require_once __DIR__ . '/../db.php';

if (!isset($_SESSION['uid'])) {
    if (isset($_POST['ajax_save'])) {
        while (ob_get_level()) { ob_end_clean(); }
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Session expired. Please reload the page and login again.']);
        exit;
    }
    header("Location: ../index.php");
    exit;
}

$session = $_SESSION['session'] ?? '2026-2027';
$msg = '';
$msgType = 'success';

// Handle Permission Form Submission (supports JSON hidden field, raw POST array, or AJAX)
if (isset($_POST['save_permissions']) || isset($_POST['ajax_save'])) {
    $submittedPermissions = [];
    if (!empty($_POST['permissions_json'])) {
        $decoded = json_decode($_POST['permissions_json'], true);
        if (is_array($decoded)) {
            $submittedPermissions = $decoded;
        }
    }
    if (empty($submittedPermissions) && isset($_POST['perm']) && is_array($_POST['perm'])) {
        $submittedPermissions = $_POST['perm'];
    }

    mysqli_begin_transaction($con);
    try {
        // Fetch all active teachers for current session
        $tListQuery = mysqli_query($con, "SELECT id, teacher_id, teacher_username, uid FROM teacher WHERE LOWER(status) = 'active' AND (teacher_session = '" . mysqli_real_escape_string($con, $session) . "' OR teacher_session IS NULL OR teacher_session = '')");
        
        // Fetch all active modules
        $mListQuery = mysqli_query($con, "SELECT module_key FROM teacher_app_modules WHERE status = 1");
        $allModules = [];
        while ($mRow = mysqli_fetch_assoc($mListQuery)) {
            $allModules[] = $mRow['module_key'];
        }

        $upsertStmt = $con->prepare("INSERT INTO teacher_app_permissions (teacher_id, module_key, is_allowed) 
            VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE is_allowed = VALUES(is_allowed), updated_at = CURRENT_TIMESTAMP");

        while ($t = mysqli_fetch_assoc($tListQuery)) {
            // Identifier can be username, uid, or numeric teacher_id
            $usernameKey = !empty($t['teacher_username']) ? trim($t['teacher_username']) : (!empty($t['uid']) ? trim($t['uid']) : (string)$t['teacher_id']);
            $idKey = !empty($t['teacher_id']) ? (string)$t['teacher_id'] : $usernameKey;

            foreach ($allModules as $modKey) {
                // Check if allowed under usernameKey or idKey
                $isAllowed = 0;
                if (isset($submittedPermissions[$usernameKey][$modKey]) && ($submittedPermissions[$usernameKey][$modKey] == 1 || $submittedPermissions[$usernameKey][$modKey] === true)) {
                    $isAllowed = 1;
                } elseif (isset($submittedPermissions[$idKey][$modKey]) && ($submittedPermissions[$idKey][$modKey] == 1 || $submittedPermissions[$idKey][$modKey] === true)) {
                    $isAllowed = 1;
                }

                // Save under usernameKey (canonical login UID for teacher app)
                $upsertStmt->bind_param("ssi", $usernameKey, $modKey, $isAllowed);
                $upsertStmt->execute();

                // If idKey is different, also sync idKey for backward compatibility
                if ($idKey !== $usernameKey && $idKey !== '') {
                    $upsertStmt->bind_param("ssi", $idKey, $modKey, $isAllowed);
                    $upsertStmt->execute();
                }
            }
        }
        $upsertStmt->close();
        mysqli_commit($con);
        $msg = "Teacher App Permissions updated successfully!";

        if (isset($_POST['ajax_save'])) {
            while (ob_get_level()) { ob_end_clean(); }
            header('Content-Type: application/json');
            echo json_encode(['status' => true, 'message' => $msg]);
            exit;
        }
    } catch (Exception $e) {
        mysqli_rollback($con);
        $msg = "Error updating permissions: " . $e->getMessage();
        $msgType = "error";

        if (isset($_POST['ajax_save'])) {
            while (ob_get_level()) { ob_end_clean(); }
            header('Content-Type: application/json');
            echo json_encode(['status' => false, 'message' => $msg]);
            exit;
        }
    }
}

// Fetch all active modules
$modulesRes = mysqli_query($con, "SELECT * FROM teacher_app_modules WHERE status = 1 ORDER BY sort_order ASC");
$modules = [];
while ($m = mysqli_fetch_assoc($modulesRes)) {
    $modules[] = $m;
}

// Fetch all active teachers
$teachersRes = mysqli_query($con, "SELECT * FROM teacher WHERE LOWER(status) = 'active' ORDER BY teacher_name ASC");
$teachers = [];
while ($t = mysqli_fetch_assoc($teachersRes)) {
    $teachers[] = $t;
}

// Fetch existing permissions into map
$permQuery = mysqli_query($con, "SELECT teacher_id, module_key, is_allowed FROM teacher_app_permissions");
$permissionMap = [];
while ($p = mysqli_fetch_assoc($permQuery)) {
    $permissionMap[$p['teacher_id']][$p['module_key']] = (int)$p['is_allowed'];
}
?>

<style>
.perm-container {
    width: 98%;
    margin: 100px auto 30px auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
}
.perm-header {
    background: #006633;
    color: #ffffff;
    padding: 15px 20px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.perm-header h2 { margin: 0; font-size: 20px; text-transform: uppercase; }
.perm-table-wrap {
    overflow-x: auto;
    max-height: 650px;
    border: 1px solid #ddd;
}
.perm-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}
.perm-table th, .perm-table td {
    border: 1px solid #e0e0e0;
    padding: 8px 10px;
    text-align: center;
    vertical-align: middle;
}
.perm-table th {
    background-color: #f1f8f3;
    color: #004d26;
    font-weight: bold;
    position: sticky;
    top: 0;
    z-index: 10;
}
.perm-table th.teacher-col {
    text-align: left;
    min-width: 220px;
    left: 0;
    z-index: 11;
    background-color: #e6f3eb;
}
.perm-table td.teacher-col {
    text-align: left;
    position: sticky;
    left: 0;
    background-color: #fafdfb;
    font-weight: bold;
    color: #333;
    z-index: 5;
}
.perm-table tr:hover {
    background-color: #f9fdfa;
}
.perm-table tr:hover td.teacher-col {
    background-color: #eaf5ee;
}
.checkbox-custom {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #008040;
}
.btn-save {
    background: #008040;
    color: #fff;
    border: none;
    padding: 10px 25px;
    font-size: 15px;
    font-weight: bold;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
.btn-save:hover { background: #006633; }
.alert-msg {
    padding: 12px 20px;
    border-radius: 4px;
    margin-bottom: 15px;
    font-weight: bold;
}
.alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
.alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
.toggle-all-btn {
    font-size: 11px;
    background: #eef2f5;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 2px 5px;
    cursor: pointer;
    margin-top: 4px;
}
.search-input {
    padding: 6px 12px;
    width: 250px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 13px;
}
</style>

<div class="perm-container">
    <div class="perm-header">
        <div>
            <h2>Teacher App Permission Matrix</h2>
            <small style="color: #e0f2e9;">Configure mobile app module access per teacher (Total Active: <?php echo count($teachers); ?>)</small>
        </div>
        <div>
            <a href="<?php echo $var . 'staff_home'; ?>" style="color: #ffffff; text-decoration: underline; font-weight: bold;">Back to Staff Home</a>
        </div>
    </div>

    <?php if (!empty($msg)): ?>
        <div id="statusAlert" class="alert-msg <?php echo $msgType === 'error' ? 'alert-error' : 'alert-success'; ?>">
            <?php echo htmlspecialchars($msg); ?>
        </div>
    <?php else: ?>
        <div id="statusAlert" class="alert-msg" style="display:none;"></div>
    <?php endif; ?>

    <form id="permForm" method="post" action="" onsubmit="prepareJsonSubmission()">
        <input type="hidden" name="permissions_json" id="permissions_json">
        
        <div style="margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
            <div>
                <button type="button" class="btn-save" style="background:#4a69bd; padding:6px 14px; font-size:12px;" onclick="toggleAllCheckboxes(true)">Grant All (Check All)</button>
                <button type="button" class="btn-save" style="background:#6a89cc; padding:6px 14px; font-size:12px;" onclick="toggleAllCheckboxes(false)">Revoke All (Uncheck All)</button>
                &nbsp;&nbsp;
                <input type="text" id="teacherSearch" class="search-input" placeholder="Search Teacher..." onkeyup="filterTeachers()">
            </div>
            <div>
                <button type="button" class="btn-save" style="background:#009933;" onclick="saveViaAjax()">Save Permissions (AJAX)</button>
                <button type="submit" name="save_permissions" class="btn-save">Save Permissions</button>
            </div>
        </div>

        <div class="perm-table-wrap">
            <table class="perm-table" id="matrixTable">
                <thead>
                    <tr>
                        <th class="teacher-col">
                            Teacher Details<br>
                            <span style="font-size:10px; font-weight:normal; color:#555;">(<?php echo count($teachers); ?> Active Teachers)</span>
                        </th>
                        <?php foreach ($modules as $mod): ?>
                            <th>
                                <?php echo htmlspecialchars($mod['module_name']); ?><br>
                                <button type="button" class="toggle-all-btn" onclick="toggleColumn('<?php echo $mod['module_key']; ?>')">Toggle</button>
                            </th>
                        <?php endforeach; ?>
                        <th style="min-width: 80px;">Row Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($teachers)): ?>
                        <tr>
                            <td colspan="<?php echo count($modules) + 2; ?>" style="padding: 20px; color: #777;">
                                No active teachers found in the database.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($teachers as $idx => $teacher): 
                            $usernameKey = !empty($teacher['teacher_username']) ? trim($teacher['teacher_username']) : (!empty($teacher['uid']) ? trim($teacher['uid']) : (string)$teacher['teacher_id']);
                            $idKey = !empty($teacher['teacher_id']) ? (string)$teacher['teacher_id'] : $usernameKey;
                            $tName = $teacher['teacher_name'] ?? $usernameKey;
                        ?>
                            <tr class="teacher-row" data-name="<?php echo htmlspecialchars(strtolower($tName . ' ' . $usernameKey)); ?>">
                                <td class="teacher-col">
                                    <strong style="color: #006633;"><?php echo htmlspecialchars($tName); ?></strong><br>
                                    <small style="color: #555;">Username: <code><?php echo htmlspecialchars($usernameKey); ?></code></small>
                                    <?php if ($idKey !== $usernameKey): ?>
                                        <small style="color: #888;"> | ID: <?php echo htmlspecialchars($idKey); ?></small>
                                    <?php endif; ?>
                                </td>
                                <?php foreach ($modules as $mod): 
                                    $modKey = $mod['module_key'];
                                    // Check permission map under either usernameKey or idKey
                                    $isAllowed = (isset($permissionMap[$usernameKey][$modKey]) && $permissionMap[$usernameKey][$modKey] === 1) ||
                                                 (isset($permissionMap[$idKey][$modKey]) && $permissionMap[$idKey][$modKey] === 1);
                                ?>
                                    <td>
                                        <input type="checkbox" 
                                               class="checkbox-custom mod-col-<?php echo $modKey; ?> row-t-<?php echo htmlspecialchars($usernameKey); ?>" 
                                               data-teacher="<?php echo htmlspecialchars($usernameKey); ?>"
                                               data-module="<?php echo htmlspecialchars($modKey); ?>"
                                               name="perm[<?php echo htmlspecialchars($usernameKey); ?>][<?php echo htmlspecialchars($modKey); ?>]" 
                                               value="1" 
                                               <?php if ($isAllowed) echo 'checked="checked"'; ?>>
                                    </td>
                                <?php endforeach; ?>
                                <td>
                                    <button type="button" class="toggle-all-btn" onclick="toggleRow('<?php echo htmlspecialchars($usernameKey); ?>')">All</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 15px; text-align: right;">
            <button type="button" class="btn-save" style="background:#009933; margin-right: 10px;" onclick="saveViaAjax()">Save Permissions (AJAX)</button>
            <button type="submit" name="save_permissions" class="btn-save">Save Permissions</button>
        </div>
    </form>
</div>

<script>
function collectPermissionsMap() {
    const map = {};
    document.querySelectorAll('.checkbox-custom').forEach(cb => {
        const t = cb.getAttribute('data-teacher');
        const m = cb.getAttribute('data-module');
        if (!map[t]) map[t] = {};
        map[t][m] = cb.checked ? 1 : 0;
    });
    return map;
}

function prepareJsonSubmission() {
    const map = collectPermissionsMap();
    document.getElementById('permissions_json').value = JSON.stringify(map);
}

function saveViaAjax() {
    const map = collectPermissionsMap();
    const alertDiv = document.getElementById('statusAlert');
    alertDiv.style.display = 'block';
    alertDiv.className = 'alert-msg alert-success';
    alertDiv.innerHTML = 'Saving permissions, please wait...';

    const formData = new FormData();
    formData.append('ajax_save', '1');
    formData.append('permissions_json', JSON.stringify(map));

    fetch('teacher_app_permissions.php', {
        method: 'POST',
        body: formData
    })
    .then(async response => {
        const rawText = await response.text();
        let data = null;
        try {
            data = JSON.parse(rawText);
        } catch (e) {
            // If HTML wrapper is present, extract JSON object
            const match = rawText.match(/\{[\s\S]*"status"[\s\S]*\}/);
            if (match) {
                data = JSON.parse(match[0]);
            } else {
                throw new Error("Invalid response format: " + rawText.substring(0, 100));
            }
        }
        return data;
    })
    .then(res => {
        if (res && res.status) {
            alertDiv.className = 'alert-msg alert-success';
            alertDiv.innerHTML = res.message || 'Permissions updated successfully!';
            setTimeout(() => {
                alertDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        } else {
            alertDiv.className = 'alert-msg alert-error';
            alertDiv.innerHTML = (res && res.message) ? res.message : 'Failed to update permissions.';
        }
    })
    .catch(err => {
        alertDiv.className = 'alert-msg alert-error';
        alertDiv.innerHTML = 'Error: ' + err.message;
    });
}

function toggleAllCheckboxes(state) {
    document.querySelectorAll('.checkbox-custom').forEach(cb => cb.checked = state);
}

function toggleColumn(modKey) {
    const checkboxes = document.querySelectorAll('.mod-col-' + modKey);
    const anyUnchecked = Array.from(checkboxes).some(cb => !cb.checked);
    checkboxes.forEach(cb => cb.checked = anyUnchecked);
}

function toggleRow(tKey) {
    const checkboxes = document.querySelectorAll('.row-t-' + CSS.escape(tKey));
    const anyUnchecked = Array.from(checkboxes).some(cb => !cb.checked);
    checkboxes.forEach(cb => cb.checked = anyUnchecked);
}

function filterTeachers() {
    const filter = document.getElementById('teacherSearch').value.toLowerCase();
    document.querySelectorAll('.teacher-row').forEach(row => {
        const name = row.getAttribute('data-name');
        if (name.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>

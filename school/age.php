<?php
$host = "localhost";
$username = "custom"; // Aapka DB username
$password = "Smart%_000";     // Aapka DB password
$dbname = "shining"; // Aapka DB name

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$results = [];
$search_age = "";

// 2. Age Form Submission Process
if (isset($_POST['search_age']) && $_POST['age'] !== '') {
    $search_age = intval($_POST['age']);

    // Prepared Statement SQL Security ke liye (SQL Injection Se Bachne Ke Liye)
    // TIMESTAMPDIFF(YEAR, dob, CURDATE()) DOB se current age calculate karta hai
    $sql = "SELECT name, dob, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM userss WHERE TIMESTAMPDIFF(YEAR, dob, CURDATE()) = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $search_age);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <title>Age Search System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-box { margin-bottom: 20px; }
        input[type="number"] { padding: 8px; width: 200px; }
        button { padding: 8px 15px; background-color: #28a745; color: white; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Age ke dwara Data Search Karein</h2>

    <!-- Search Form -->
    <div class="form-box">
        <form method="POST" action="">
            <label for="age">Age Darj Karein:</label>
            <input type="number" id="age" name="age" placeholder="Ex: 25" value="<?php echo htmlspecialchars($search_age); ?>" required>
            <button type="submit" name="search_age">Search</button>
        </form>
    </div>

    <!-- Results Display Table -->
    <?php if (isset($_POST['search_age'])): ?>
        <h3>Search Results (Age: <?php echo htmlspecialchars($search_age); ?> Years)</h3>
        <?php if (!empty($results)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Date of Birth (DOB)</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['dob']); ?></td>
                            <td><?php echo htmlspecialchars($user['age']); ?> Years</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: red;">Is age ka koi record nahi mila.</p>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
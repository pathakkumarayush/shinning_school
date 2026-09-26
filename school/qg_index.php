<?php
if(!isset($_SESSION['uid'])) {
    echo "<script>window.location='../index.php';</script>";
    exit;
}

// Load styles specifically for QG module (only for non-AJAX requests)
if (!isset($_GET['ajax']) || $_GET['ajax'] !== '1') {
    echo '<link rel="stylesheet" type="text/css" href="qg/css/qg_styles.css" />';
}

// Include database helper routines
require_once("qg/db_helpers.php");

// Route actions
$action = isset($_GET['action']) ? trim($_GET['action']) : 'list';

switch($action) {
    case 'create':
        include "qg/create.php";
        break;
    case 'upload':
    case 'upload_paper':
        include "qg/upload_paper.php";
        break;
    case 'exam_master':
        include "qg/exam_master.php";
        break;
    case 'questions_bank':
        include "qg/questions_bank.php";
        break;
    case 'preview':
        include "qg/preview.php";
        break;
    case 'list':
    default:
        include "qg/list.php";
        break;
}
?>

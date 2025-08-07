<?php
include('dbexam.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM student WHERE student_id = '$id'");
}
header("Location: index.php");
exit;

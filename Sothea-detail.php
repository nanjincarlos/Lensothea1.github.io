<?php
include('dbexam.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "
        SELECT 
            s.student_name,
            u.university_name,
            f.faculty_name,
            p.province_name
        FROM student s
        LEFT JOIN university u ON s.stu_university_id = u.university_id
        LEFT JOIN faculty f ON s.stu_faculty_id = f.faculty_id
        LEFT JOIN province p ON s.stu_province_id = p.province_id
        WHERE s.student_id = '$id'
    ";

    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Detail</title>
</head>

<body>
    <div style="max-width: 600px; margin: auto; text-align: center;">
        <?php if ($student): ?>
            <h3>Student Name: <?= $student['student_name'] ?></h3>
            <h4><i>Details</i></h4>

            <table border="1" cellpadding="8" cellspacing="0" style="margin: auto;">
                <tr>
                    <th align="left">University Name</th>
                    <td align="left"><?= $student['university_name'] ?></td>
                </tr>
                <tr>
                    <th align="left">Faculty Name</th>
                    <td align="left"><?= $student['faculty_name'] ?></td>
                </tr>
                <tr>
                    <th align="left">Address</th>
                    <td align="left"><?= $student['province_name'] ?></td>
                </tr>
            </table>
            <br>
            <a href="index.php">Back to List</a>
        <?php else: ?>
            <p>Student not found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
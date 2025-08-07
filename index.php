<?php
include('dbexam.php');

$sql = "SELECT student_id, student_name, gender FROM student";
$result = $conn->query($sql);
$total = $result->num_rows;
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of Students</title>
</head>

<body>

    <h2 style="text-align:center;">List of Students</h2>

    <?php if ($total > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0" align="center">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Options</th>
            </tr>

            <tr>
                <td colspan="4" align="center">
                    <a href="Sothea-add.php">Add (a student)</a>
                </td>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td align="center">
                        <a href="Sothea-detail.php?id=<?= $row['student_id'] ?>">
                            <?= $row['student_id'] ?>
                        </a>
                    </td>
                    <td><?= $row['student_name'] ?></td>
                    <td><?= ucfirst($row['gender']) ?></td>
                    <td align="center">
                        <a href="Sothea-update.php?id=<?= $row['student_id'] ?>">Update</a> |
                        <a href="Sothea-delete.php?id=<?= $row['student_id'] ?>"
                            onclick="return confirm('Delete this student?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <p style="text-align:center;">There are <?= $total ?> students</p>
    <?php else: ?>
        <p style="text-align:center;">No students found.</p>
    <?php endif; ?>

</body>

</html>

<?php $conn->close(); ?>
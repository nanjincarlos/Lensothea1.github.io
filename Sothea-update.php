<?php
include('dbexam.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = $conn->query("SELECT * FROM student WHERE student_id = '$id'")->fetch_assoc();
}

$universities = $conn->query("SELECT * FROM university");
$faculties = $conn->query("SELECT * FROM faculty");
$provinces = $conn->query("SELECT * FROM province");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['student_id'];
    $name = $_POST['student_name'];
    $gender = $_POST['gender'];
    $university = $_POST['university_id'];
    $faculty = $_POST['faculty_id'];
    $province = $_POST['province_id'];

    $sql = "UPDATE student SET
            student_name = '$name',
            gender = '$gender',
            stu_university_id = '$university',
            stu_faculty_id = '$faculty',
            stu_province_id = '$province'
            WHERE student_id = '$id'";

    if ($conn->query($sql)) {
        echo "Student updated.<br><a href='index.php'>Back</a>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
</head>

<body>
    <div style="max-width: 600px; margin: auto; text-align: center;">
        <h2>Update Student</h2>
        <form method="post">
            <input type="hidden" name="student_id" value="<?= $student['student_id'] ?>">
            <table border="1" cellpadding="8" style="margin: auto;">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="student_name" value="<?= $student['student_name'] ?>" required></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <select name="gender" required>
                            <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                            <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>University:</td>
                    <td>
                        <select name="university_id" required>
                            <?php while ($u = $universities->fetch_assoc()): ?>
                                <option value="<?= $u['university_id'] ?>"
                                    <?= $u['university_id'] == $student['stu_university_id'] ? 'selected' : '' ?>>
                                    <?= $u['university_name'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Faculty:</td>
                    <td>
                        <select name="faculty_id" required>
                            <?php while ($f = $faculties->fetch_assoc()): ?>
                                <option value="<?= $f['faculty_id'] ?>" <?= $f['faculty_id'] == $student['stu_faculty_id'] ? 'selected' : '' ?>>
                                    <?= $f['faculty_name'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Province:</td>
                    <td>
                        <select name="province_id" required>
                            <?php while ($p = $provinces->fetch_assoc()): ?>
                                <option value="<?= $p['province_id'] ?>" <?= $p['province_id'] == $student['stu_province_id'] ? 'selected' : '' ?>>
                                    <?= $p['province_name'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Update Student"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
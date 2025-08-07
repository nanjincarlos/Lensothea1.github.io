<?php
include('dbexam.php');

$universities = $conn->query("SELECT * FROM university");
$faculties = $conn->query("SELECT * FROM faculty");
$provinces = $conn->query("SELECT * FROM province");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $gender = $_POST['gender'];
    $university = $_POST['university_id'];
    $faculty = $_POST['faculty_id'];
    $province = $_POST['province_id'];

    $sql = "INSERT INTO student (student_name, gender, stu_university_id, stu_faculty_id, stu_province_id)
            VALUES ('$name', '$gender', '$university', '$faculty', '$province')";

    if ($conn->query($sql)) {
        echo "Student added successfully.<br><a href='index.php'>Back</a>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>
    <div style="max-width: 600px; margin: auto; text-align: center;">
        <h2>Add Student</h2>
        <form method="post">
            <table border="1" cellpadding="8" style="margin: auto;">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="student_name" required></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <select name="gender" required>
                            <option value="">--Select--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>University:</td>
                    <td>
                        <select name="university_id" required>
                            <option value="">--Select--</option>
                            <?php while ($u = $universities->fetch_assoc()): ?>
                                <option value="<?= $u['university_id'] ?>"><?= $u['university_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Faculty:</td>
                    <td>
                        <select name="faculty_id" required>
                            <option value="">--Select--</option>
                            <?php while ($f = $faculties->fetch_assoc()): ?>
                                <option value="<?= $f['faculty_id'] ?>"><?= $f['faculty_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Province:</td>
                    <td>
                        <select name="province_id" required>
                            <option value="">--Select--</option>
                            <?php while ($p = $provinces->fetch_assoc()): ?>
                                <option value="<?= $p['province_id'] ?>"><?= $p['province_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Add Student"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
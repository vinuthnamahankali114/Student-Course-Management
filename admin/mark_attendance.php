<?php
include "../includes/header.php";

if(isset($_POST['save']))
{
    $student=$_POST['student'];
    $course=$_POST['course'];
    $date=$_POST['date'];
    $status=$_POST['status'];

    mysqli_query($conn,"
    INSERT INTO attendance
    (student_id,course_id,attendance_date,status)

    VALUES

    ('$student','$course','$date','$status')
    ");

    header("Location:attendance.php");
}

$students=mysqli_query($conn,"
SELECT * FROM users
WHERE role='student'
");

$courses=mysqli_query($conn,"
SELECT * FROM courses
");
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Mark Attendance</h4>

</div>

<div class="card-body">

<form method="POST">

<label>Student</label>

<select
name="student"
class="form-control mb-3">

<?php while($s=mysqli_fetch_assoc($students)){ ?>

<option value="<?= $s['id']; ?>">

<?= $s['fullname']; ?>

</option>

<?php } ?>

</select>

<label>Course</label>

<select
name="course"
class="form-control mb-3">

<?php while($c=mysqli_fetch_assoc($courses)){ ?>

<option value="<?= $c['id']; ?>">

<?= $c['course_name']; ?>

</option>

<?php } ?>

</select>

<label>Date</label>

<input
type="date"
name="date"
class="form-control mb-3"
required>

<label>Status</label>

<select
name="status"
class="form-control mb-3">

<option>Present</option>

<option>Absent</option>

</select>

<button
class="btn btn-success"
name="save">

Save Attendance

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
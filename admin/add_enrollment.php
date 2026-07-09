<?php
include "../includes/header.php";

if(isset($_POST['save']))
{
    $student=$_POST['student'];
    $course=$_POST['course'];

    mysqli_query($conn,"
    INSERT INTO enrollments(student_id,course_id)
    VALUES('$student','$course')
    ");

    header("Location:enrollments.php");
}

$students=mysqli_query($conn,"
SELECT * FROM users
WHERE role='student'
");

$courses=mysqli_query($conn,"
SELECT * FROM courses
WHERE status='Active'
");
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Add Enrollment</h4>

</div>

<div class="card-body">

<form method="POST">

<label>Student</label>

<select
name="student"
class="form-control mb-3"
required>

<?php while($s=mysqli_fetch_assoc($students)){ ?>

<option value="<?= $s['id']; ?>">

<?= $s['fullname']; ?>

</option>

<?php } ?>

</select>

<label>Course</label>

<select
name="course"
class="form-control mb-3"
required>

<?php while($c=mysqli_fetch_assoc($courses)){ ?>

<option value="<?= $c['id']; ?>">

<?= $c['course_name']; ?>

</option>

<?php } ?>

</select>

<button
class="btn btn-success"
name="save">

Enroll Student

</button>

<a
href="enrollments.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
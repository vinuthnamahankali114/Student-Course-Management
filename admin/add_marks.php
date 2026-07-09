<?php
include "../includes/header.php";

if(isset($_POST['save']))
{
    $student=$_POST['student'];
    $course=$_POST['course'];
    $exam=$_POST['exam'];
    $marks=$_POST['marks'];

    mysqli_query($conn,"
    INSERT INTO marks(student_id,course_id,exam_name,marks)
    VALUES('$student','$course','$exam','$marks')
    ");

    header("Location:marks.php");
}

$students=mysqli_query($conn,"SELECT * FROM users WHERE role='student'");
$courses=mysqli_query($conn,"SELECT * FROM courses");
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Add Student Marks</h4>

</div>

<div class="card-body">

<form method="POST">

<label>Student</label>

<select name="student" class="form-control mb-3">

<?php while($s=mysqli_fetch_assoc($students)){ ?>

<option value="<?= $s['id']; ?>">

<?= $s['fullname']; ?>

</option>

<?php } ?>

</select>

<label>Course</label>

<select name="course" class="form-control mb-3">

<?php while($c=mysqli_fetch_assoc($courses)){ ?>

<option value="<?= $c['id']; ?>">

<?= $c['course_name']; ?>

</option>

<?php } ?>

</select>

<input
type="text"
name="exam"
class="form-control mb-3"
placeholder="Exam Name"
required>

<input
type="number"
name="marks"
class="form-control mb-3"
placeholder="Marks"
required>

<button
class="btn btn-success"
name="save">

Save Marks

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
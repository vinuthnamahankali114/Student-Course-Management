<?php
session_start();
include "../config/db.php";

$student=$_SESSION['id'];

if(isset($_POST['enroll']))
{
    $course=$_POST['course'];

    mysqli_query($conn,"
    INSERT INTO enrollments(student_id,course_id)
    VALUES('$student','$course')
    ");

    echo "<script>alert('Enrollment Successful');</script>";
}

$courses=mysqli_query($conn,"
SELECT * FROM courses
WHERE status='Active'
");
?>

<!DOCTYPE html>

<html>

<head>

<title>Enroll Course</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

Enroll Course

</div>

<div class="card-body">

<form method="POST">

<select
name="course"
class="form-control mb-3">

<?php while($row=mysqli_fetch_assoc($courses)){ ?>

<option value="<?= $row['id']; ?>">

<?= $row['course_name']; ?>

</option>

<?php } ?>

</select>

<button
class="btn btn-primary"
name="enroll">

Enroll

</button>

</form>

</div>

</div>

</div>

</body>

</html>
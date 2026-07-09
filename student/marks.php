<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['id']))
{
    header("Location:../login.php");
    exit();
}

$id=$_SESSION['id'];

$query=mysqli_query($conn,"
SELECT
courses.course_name,
marks.exam_name,
marks.marks

FROM marks

JOIN courses
ON marks.course_id=courses.id

WHERE marks.student_id='$id'
");
?>

<!DOCTYPE html>

<html>

<head>

<title>My Marks</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>My Marks</h2>

<table class="table table-bordered">

<tr>

<th>Course</th>

<th>Exam</th>

<th>Marks</th>

</tr>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['course_name']; ?></td>

<td><?= $row['exam_name']; ?></td>

<td><?= $row['marks']; ?></td>

</tr>

<?php } ?>

</table>

<a href="dashboard.php" class="btn btn-primary">

Back Dashboard

</a>

</body>

</html>
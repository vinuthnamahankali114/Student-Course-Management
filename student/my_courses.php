<?php
session_start();
include "../config/db.php";

$id=$_SESSION['id'];

$query=mysqli_query($conn,"
SELECT courses.course_name,
courses.course_code,
courses.faculty

FROM enrollments

JOIN courses

ON enrollments.course_id=courses.id

WHERE enrollments.student_id='$id'
");
?>

<!DOCTYPE html>

<html>

<head>

<title>My Courses</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h3>My Courses</h3>

<table class="table table-bordered">

<tr>

<th>Course</th>

<th>Code</th>

<th>Faculty</th>

</tr>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['course_name']; ?></td>

<td><?= $row['course_code']; ?></td>

<td><?= $row['faculty']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
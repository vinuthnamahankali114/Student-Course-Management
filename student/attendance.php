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
attendance.attendance_date,
attendance.status

FROM attendance

JOIN courses

ON attendance.course_id=courses.id

WHERE attendance.student_id='$id'

ORDER BY attendance.attendance_date DESC
");
?>

<!DOCTYPE html>

<html>

<head>

<title>My Attendance</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2>Attendance</h2>

<table class="table table-bordered">

<tr>

<th>Course</th>

<th>Date</th>

<th>Status</th>

</tr>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['course_name']; ?></td>

<td><?= $row['attendance_date']; ?></td>

<td>

<?php
if($row['status']=="Present")
{
echo "<span class='badge bg-success'>Present</span>";
}
else
{
echo "<span class='badge bg-danger'>Absent</span>";
}
?>

</td>

</tr>

<?php } ?>

</table>

<a href="dashboard.php" class="btn btn-primary">

Back Dashboard

</a>

</body>

</html>
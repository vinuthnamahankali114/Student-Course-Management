<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

include "../config/db.php";

if(!isset($_SESSION['id']) || $_SESSION['role']!="faculty"){
    header("Location:../login.php");
    exit();
}

$query = mysqli_query($conn,"
SELECT attendance.id,
users.fullname,
courses.course_name,
attendance.attendance_date,
attendance.status
FROM attendance
INNER JOIN users ON attendance.student_id = users.id
INNER JOIN courses ON attendance.course_id = courses.id
ORDER BY attendance.attendance_date DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Faculty Attendance</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

<h4>Attendance Records</h4>

<a href="mark_attendance.php" class="btn btn-light">

Mark Attendance

</a>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Student</th>

<th>Course</th>

<th>Date</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<?php
while($row=mysqli_fetch_assoc($query))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['attendance_date']; ?></td>

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

<?php
}
?>

</tbody>

</table>

<a href="dashboard.php" class="btn btn-secondary">

Back to Dashboard

</a>

</div>

</div>

</body>

</html>
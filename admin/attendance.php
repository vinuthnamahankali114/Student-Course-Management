<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

$query=mysqli_query($conn,"
SELECT attendance.id,
users.fullname,
courses.course_name,
attendance.attendance_date,
attendance.status

FROM attendance

JOIN users
ON attendance.student_id=users.id

JOIN courses
ON attendance.course_id=courses.id

ORDER BY attendance.attendance_date DESC
");
?>

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between">

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

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['fullname']; ?></td>

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

</tbody>

</table>

</div>

</div>

<?php include "../includes/footer.php"; ?>
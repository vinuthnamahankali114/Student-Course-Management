<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

$query = mysqli_query($conn,"
SELECT enrollments.id,
users.fullname,
courses.course_name,
courses.course_code,
enrollments.enrolled_at

FROM enrollments

INNER JOIN users ON enrollments.student_id=users.id

INNER JOIN courses ON enrollments.course_id=courses.id

ORDER BY enrollments.id DESC
");
?>

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between">

<h4>Student Enrollments</h4>

<a href="add_enrollment.php" class="btn btn-light">

Add Enrollment

</a>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Student</th>

<th>Course</th>

<th>Course Code</th>

<th>Date</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['fullname']; ?></td>

<td><?= $row['course_name']; ?></td>

<td><?= $row['course_code']; ?></td>

<td><?= $row['enrolled_at']; ?></td>

<td>

<a
href="delete_enrollment.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete Enrollment?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include "../includes/footer.php"; ?>
<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

$query=mysqli_query($conn,"
SELECT
marks.id,
users.fullname,
courses.course_name,
marks.exam_name,
marks.marks

FROM marks

JOIN users
ON marks.student_id=users.id

JOIN courses
ON marks.course_id=courses.id

ORDER BY marks.id DESC
");
?>

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between">

<h4>Marks Management</h4>

<a href="add_marks.php" class="btn btn-light">

Add Marks

</a>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Student</th>

<th>Course</th>

<th>Exam</th>

<th>Marks</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['fullname']; ?></td>

<td><?= $row['course_name']; ?></td>

<td><?= $row['exam_name']; ?></td>

<td><?= $row['marks']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include "../includes/footer.php"; ?>
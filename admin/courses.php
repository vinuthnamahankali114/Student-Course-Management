<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

$search="";

if(isset($_GET['search']))
{
    $search=mysqli_real_escape_string($conn,$_GET['search']);

    $result=mysqli_query($conn,"
    SELECT * FROM courses
    WHERE
    course_name LIKE '%$search%'
    OR course_code LIKE '%$search%'
    ");
}
else
{
    $result=mysqli_query($conn,"
    SELECT * FROM courses
    ORDER BY id DESC
    ");
}
?>

<div class="card shadow">

<div class="card-header bg-success text-white d-flex justify-content-between">

<h4>Course Management</h4>

<a href="add_course.php" class="btn btn-light">

Add Course

</a>

</div>

<div class="card-body">

<form method="GET">

<div class="input-group mb-3">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Course">

<button class="btn btn-primary">

Search

</button>

</div>

</form>

<table class="table table-hover table-bordered">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Code</th>

<th>Faculty</th>

<th>Credits</th>

<th>Semester</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['course_name']; ?></td>

<td><?= $row['course_code']; ?></td>

<td><?= $row['faculty']; ?></td>

<td><?= $row['credits']; ?></td>

<td><?= $row['semester']; ?></td>

<td><?= $row['status']; ?></td>

<td>

<a
href="edit_course.php?id=<?= $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete_course.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete Course?')">

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
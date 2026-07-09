<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

$query=mysqli_query($conn,"
SELECT notes.id,
courses.course_name,
notes.title,
notes.file_name,
notes.uploaded_at

FROM notes

JOIN courses
ON notes.course_id=courses.id

ORDER BY notes.id DESC
");
?>

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between">

<h4>Study Notes</h4>

<a href="upload_note.php" class="btn btn-light">

Upload Note

</a>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Course</th>
<th>Title</th>
<th>File</th>
<th>Date</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['course_name']; ?></td>

<td><?= $row['title']; ?></td>

<td>

<a
target="_blank"
href="../uploads/notes/<?= $row['file_name']; ?>">

View

</a>

</td>

<td><?= $row['uploaded_at']; ?></td>

<td>

<a
href="delete_note.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<?php include "../includes/footer.php"; ?>
<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['id']))
{
    header("Location:../login.php");
    exit();
}

$query=mysqli_query($conn,"
SELECT
courses.course_name,
notes.title,
notes.file_name

FROM notes
INNER JOIN courses
ON notes.course_id=courses.id

ORDER BY notes.uploaded_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Study Notes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<h2 class="mb-4">Study Notes</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>Course</th>

<th>Title</th>

<th>Download</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($query)>0)
{
    while($row=mysqli_fetch_assoc($query))
    {
?>

<tr>

<td><?= $row['course_name']; ?></td>

<td><?= $row['title']; ?></td>

<td>

<a
class="btn btn-success btn-sm"
href="../uploads/notes/<?= $row['file_name']; ?>"
target="_blank">

Download

</a>

</td>

</tr>

<?php
    }
}
else
{
?>

<tr>

<td colspan="3" class="text-center">

No Notes Available

</td>

</tr>

<?php
}
?>

</tbody>

</table>

<a href="dashboard.php" class="btn btn-primary">

Back Dashboard

</a>

</body>

</html>
<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

include "../config/db.php";

if(!isset($_SESSION['id']) || $_SESSION['role']!="faculty"){
    header("Location:../login.php");
    exit();
}

$query=mysqli_query($conn,"
SELECT
notes.id,
courses.course_name,
notes.title,
notes.file_name,
notes.uploaded_at
FROM notes
INNER JOIN courses ON notes.course_id=courses.id
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

<div class="card shadow">

<div class="card-header bg-success text-white d-flex justify-content-between">

<h4>Study Notes</h4>

<a href="upload_note.php" class="btn btn-light">

Upload Note

</a>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Course</th>
<th>Title</th>
<th>File</th>
<th>Date</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['title']; ?></td>

<td>

<a
href="../uploads/notes/<?php echo $row['file_name']; ?>"
target="_blank"
class="btn btn-primary btn-sm">

View

</a>

</td>

<td><?php echo $row['uploaded_at']; ?></td>

<td>

<a
href="delete_note.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this note?');">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="dashboard.php" class="btn btn-secondary">

Back

</a>

</div>

</div>

</body>

</html>
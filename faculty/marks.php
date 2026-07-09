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
marks.id,
users.fullname,
courses.course_name,
marks.exam_name,
marks.marks
FROM marks
INNER JOIN users ON marks.student_id=users.id
INNER JOIN courses ON marks.course_id=courses.id
ORDER BY marks.id DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Marks Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white d-flex justify-content-between">

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

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['course_name']; ?></td>

<td><?php echo $row['exam_name']; ?></td>

<td><?php echo $row['marks']; ?></td>

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
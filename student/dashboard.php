<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['id']))
{
    header("Location:../login.php");
    exit();
}

$student=$_SESSION['id'];

$totalCourses=mysqli_num_rows(mysqli_query($conn,"
SELECT * FROM enrollments
WHERE student_id='$student'
"));

$totalNotes=mysqli_num_rows(mysqli_query($conn,"
SELECT * FROM notes
"));

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Student Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
background:#f4f6f9;
}

.sidebar{

position:fixed;

left:0;

top:0;

width:250px;

height:100%;

background:#0d6efd;

padding-top:20px;

}

.sidebar a{

display:block;

padding:15px;

color:white;

text-decoration:none;

}

.sidebar a:hover{

background:white;

color:#0d6efd;

}

.content{

margin-left:260px;

padding:20px;

}

.card{

border:none;

border-radius:15px;

}

</style>

</head>

<body>

<div class="sidebar">

<h3 class="text-center text-white">

Student Panel

</h3>

<hr class="text-white">

<a href="dashboard.php">

<i class="fas fa-home"></i>

Dashboard

</a>

<a href="enroll_course.php">

<i class="fas fa-book"></i>

Enroll Course

</a>

<a href="my_courses.php">

<i class="fas fa-book-open"></i>

My Courses

</a>

<a href="profile.php">
    <i class="fas fa-user"></i>
    My Profile
</a>

<a href="attendance.php">

<i class="fas fa-calendar-check"></i>

Attendance

</a>

<a href="marks.php">

<i class="fas fa-chart-line"></i>

Marks

</a>

<a href="notes.php">

<i class="fas fa-file-pdf"></i>

Notes

</a>

<a href="../logout.php">

<i class="fas fa-sign-out-alt"></i>

Logout

</a>

</div>

<div class="content">

<nav class="navbar bg-white shadow rounded">

<div class="container-fluid">

<h4>

Welcome,

<?php echo $_SESSION['name']; ?>

</h4>

</div>

</nav>

<br>

<div class="row">

<div class="col-md-6">

<div class="card shadow p-4">

<h5>

My Courses

</h5>

<h1>

<?php echo $totalCourses; ?>

</h1>

</div>

</div>

<div class="col-md-6">

<div class="card shadow p-4">

<h5>

Notes Available

</h5>

<h1>

<?php echo $totalNotes; ?>

</h1>

</div>

</div>

</div>

</div>

</body>

</html>
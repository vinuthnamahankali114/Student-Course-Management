<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'faculty') {
    header("Location:../login.php");
    exit();
}

// Your dashboard code starts here...

// Get Faculty Name
$facultyName = isset($_SESSION['name']) ? $_SESSION['name'] : "Faculty";

// Statistics
$studentQuery = mysqli_query($conn, "SELECT * FROM users WHERE role='student'");
$totalStudents = $studentQuery ? mysqli_num_rows($studentQuery) : 0;

$courseQuery = mysqli_query($conn, "SELECT * FROM courses");
$totalCourses = $courseQuery ? mysqli_num_rows($courseQuery) : 0;

$noteQuery = mysqli_query($conn, "SELECT * FROM notes");
$totalNotes = $noteQuery ? mysqli_num_rows($noteQuery) : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Faculty Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f5f5;
    margin:0;
}

.sidebar{
    position:fixed;
    width:250px;
    height:100%;
    background:#198754;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h3{
    color:#fff;
    text-align:center;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px;
    transition:.3s;
}

.sidebar a:hover{
    background:white;
    color:#198754;
}

.content{
    margin-left:250px;
    padding:25px;
}

.card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Faculty Panel</h3>

<hr class="text-white">

<a href="dashboard.php">
<i class="fas fa-home"></i> Dashboard
</a>

<a href="attendance.php">
<i class="fas fa-calendar-check"></i> Attendance
</a>

<a href="marks.php">
<i class="fas fa-chart-line"></i> Marks
</a>

<a href="notes.php">
<i class="fas fa-book"></i> Notes
</a>

<a href="profile.php">
<i class="fas fa-user"></i> Profile
</a>

<a href="../logout.php">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</div>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>Welcome, <?php echo $facultyName; ?></h2>

<a href="../logout.php" class="btn btn-danger">
Logout
</a>

</div>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card shadow p-4 text-center">

<h5>Total Students</h5>

<h1><?php echo $totalStudents; ?></h1>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow p-4 text-center">

<h5>Total Courses</h5>

<h1><?php echo $totalCourses; ?></h1>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow p-4 text-center">

<h5>Total Notes</h5>

<h1><?php echo $totalNotes; ?></h1>

</div>

</div>

</div>

<div class="card shadow mt-4">

<div class="card-header bg-success text-white">

<h4>Faculty Dashboard Analytics</h4>

</div>

<div class="card-body">

<canvas id="facultyChart"></canvas>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById("facultyChart"),{

type:'bar',

data:{

labels:['Students','Courses','Notes'],

datasets:[{

label:'Faculty Statistics',

data:[

<?php echo $totalStudents; ?>,

<?php echo $totalCourses; ?>,

<?php echo $totalNotes; ?>

]

}]

},

options:{

responsive:true

}

});

</script>

</body>

</html>
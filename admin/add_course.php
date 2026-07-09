<?php
include "../includes/header.php";

if(isset($_POST['save']))
{
$name=$_POST['course_name'];
$code=$_POST['course_code'];
$faculty=$_POST['faculty'];
$credits=$_POST['credits'];
$description=$_POST['description'];
$semester=$_POST['semester'];
$status=$_POST['status'];

mysqli_query($conn,"
INSERT INTO courses
(course_name,course_code,faculty,credits,description,semester,status)

VALUES

('$name','$code','$faculty','$credits','$description','$semester','$status')
");

header("Location:courses.php");
}
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Add Course</h4>

</div>

<div class="card-body">

<form method="POST">

<input type="text" name="course_name" class="form-control mb-3" placeholder="Course Name" required>

<input type="text" name="course_code" class="form-control mb-3" placeholder="Course Code" required>

<input type="text" name="faculty" class="form-control mb-3" placeholder="Faculty Name" required>

<input type="number" name="credits" class="form-control mb-3" placeholder="Credits" required>

<textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>

<select name="semester" class="form-control mb-3">

<option>1-1</option>
<option>1-2</option>
<option>2-1</option>
<option>2-2</option>
<option>3-1</option>
<option>3-2</option>
<option>4-1</option>
<option>4-2</option>

</select>

<select name="status" class="form-control mb-3">

<option>Active</option>
<option>Inactive</option>

</select>

<button class="btn btn-success" name="save">

Save Course

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
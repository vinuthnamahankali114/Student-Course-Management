<?php
include "../includes/header.php";

if(isset($_POST['upload']))
{
    $course=$_POST['course'];
    $title=$_POST['title'];

    $file=$_FILES['pdf']['name'];

    $tmp=$_FILES['pdf']['tmp_name'];

    move_uploaded_file($tmp,"../uploads/notes/".$file);

    mysqli_query($conn,"
    INSERT INTO notes(course_id,title,file_name)

    VALUES

    ('$course','$title','$file')
    ");

    header("Location:notes.php");
}

$courses=mysqli_query($conn,"
SELECT * FROM courses
");
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Upload Notes</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<select
name="course"
class="form-control mb-3">

<?php while($c=mysqli_fetch_assoc($courses)){ ?>

<option value="<?= $c['id']; ?>">

<?= $c['course_name']; ?>

</option>

<?php } ?>

</select>

<input
type="text"
name="title"
class="form-control mb-3"
placeholder="Title"
required>

<input
type="file"
name="pdf"
class="form-control mb-3"
accept=".pdf,.ppt,.pptx,.doc,.docx"
required>

<button
class="btn btn-success"
name="upload">

Upload

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
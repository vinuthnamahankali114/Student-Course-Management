<?php
include "../includes/header.php";

$id=$_GET['id'];

mysqli_query($conn,"
DELETE FROM enrollments
WHERE id='$id'
");

header("Location:enrollments.php");
exit();
?>
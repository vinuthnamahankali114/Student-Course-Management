<?php

include "../includes/header.php";

$id=$_GET['id'];

mysqli_query($conn,"
DELETE FROM notes
WHERE id='$id'
");

header("Location:notes.php");
<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

include "../config/db.php";

if(!isset($_SESSION['id']))
{
    header("Location:../login.php");
    exit();
}
?>

<!DOCTYPE html>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Smart Campus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
background:#f4f6f9;
}

.sidebar{
width:250px;
height:100vh;
position:fixed;
background:#0d6efd;
color:white;
}

.sidebar a{

color:white;

display:block;

padding:15px;

text-decoration:none;

}

.sidebar a:hover{

background:white;

color:#0d6efd;

}

.content{

margin-left:250px;

padding:20px;

}

.card{

border:none;

border-radius:15px;

}

</style>

</head>

<body>
<?php
include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Smart Campus Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
<i class="fa-solid fa-graduation-cap"></i>
Smart Campus
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="#">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#features">Features</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#about">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#contact">Contact</a>
</li>

<li class="nav-item">
<a href="login.php" class="btn btn-light ms-2">
Login
</a>
</li>

<li class="nav-item">
<a href="register.php" class="btn btn-warning ms-2">
Register
</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- Hero -->

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h1 class="display-4 fw-bold">

Smart Campus Management System

</h1>

<p class="lead mt-3">

Manage students, faculty, attendance, marks, courses and reports in one secure platform.

</p>

<a href="register.php" class="btn btn-warning btn-lg mt-3">

Get Started

</a>

</div>

<div class="col-lg-6 text-center">

<img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=900"
class="img-fluid rounded shadow">

</div>

</div>

</div>

</section>

<!-- Features -->

<section id="features" class="py-5">

<div class="container">

<h2 class="text-center mb-5">

Features

</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<i class="fa-solid fa-users fa-3x text-primary"></i>

<h4 class="mt-3">

Student Management

</h4>

<p>

Manage students efficiently.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<i class="fa-solid fa-book fa-3x text-success"></i>

<h4 class="mt-3">

Courses

</h4>

<p>

Manage all academic courses.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<i class="fa-solid fa-chart-column fa-3x text-danger"></i>

<h4 class="mt-3">

Analytics

</h4>

<p>

Professional dashboard reports.

</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- About -->

<section id="about" class="bg-light py-5">

<div class="container">

<h2 class="text-center">

About

</h2>

<p class="text-center mt-3">

Smart Campus Management System is a modern web application developed using PHP, MySQL, Bootstrap, JavaScript and AJAX to simplify campus administration.

</p>

</div>

</section>

<!-- Contact -->

<section id="contact" class="py-5">

<div class="container">

<h2 class="text-center">

Contact

</h2>

<p class="text-center">

Email:
admin@smartcampus.com

</p>

</div>

</section>

<footer class="bg-dark text-white text-center p-3">

© 2026 Smart Campus Management System

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
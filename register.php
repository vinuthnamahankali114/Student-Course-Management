<?php
include "config/db.php";

$message = "";

if(isset($_POST['register']))
{
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check)>0)
    {
        $message = "<div class='alert alert-danger'>Email already exists!</div>";
    }
    else
    {
        mysqli_query($conn,"INSERT INTO users(fullname,email,password,role,phone)
        VALUES('$fullname','$email','$password','$role','$phone')");

        $message = "<div class='alert alert-success'>
        Registration Successful!
        <a href='login.php'>Login Here</a>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow mt-5">

<div class="card-header bg-primary text-white">

<h3>Create Account</h3>

</div>

<div class="card-body">

<?= $message ?>

<form method="POST">

<input
type="text"
name="fullname"
class="form-control mb-3"
placeholder="Full Name"
required>

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input
type="text"
name="phone"
class="form-control mb-3"
placeholder="Phone">

<select
name="role"
class="form-control mb-3">

<option value="student">Student</option>

<option value="faculty">Faculty</option>

</select>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button
class="btn btn-primary w-100"
name="register">

Register

</button>

</form>

<br>

<a href="login.php">

Already have an account?

</a>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
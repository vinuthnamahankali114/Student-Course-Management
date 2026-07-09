<?php
session_start();
include "config/db.php";

$error = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['fullname'];
            $_SESSION['role'] = $row['role'];

            if($row['role'] == "admin")
            {
                header("Location: admin/dashboard.php");
            }
            elseif($row['role'] == "faculty")
            {
                header("Location: faculty/dashboard.php");
            }
            else
            {
                header("Location: student/dashboard.php");
            }
            exit();
        }
        else
        {
            $error = "Incorrect password!";
        }
    }
    else
    {
        $error = "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Smart Campus Management System - Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f4f6f9;
}

.card{
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow mt-5">

<div class="card-header bg-success text-white text-center">

<h3>🎓 Smart Campus Management System</h3>

<p class="mb-0">Login to Continue</p>

</div>

<div class="card-body">

<?php
if(isset($_GET['logout']) && $_GET['logout']=="success")
{
?>
<div id="logoutAlert" class="alert alert-success alert-dismissible fade show">

<strong>✅ Logout Successful!</strong> Thank you for using Smart Campus Management System.

<button type="button" class="btn-close" data-bs-dismiss="alert"></button>

</div>
<?php
}
?>

<?php
if($error!="")
{
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter Email"
required>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

</div>

<button
type="submit"
name="login"
class="btn btn-success w-100">

<i class="bi bi-box-arrow-in-right"></i>
 Login

</button>

</form>

<div class="text-center mt-3">

<a href="forgot_password.php">
Forgot Password?
</a>

</div>

<div class="text-center mt-2">

<a href="register.php">
Create New Account
</a>

</div>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

setTimeout(function(){

let alert=document.getElementById("logoutAlert");

if(alert)
{
    alert.style.display="none";
}

},3000);

</script>

</body>

</html>
<?php
include "config/db.php";

$message="";

if(isset($_POST['reset']))
{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    $check=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check)>0)
    {
        mysqli_query($conn,"
        UPDATE users
        SET password='$password'
        WHERE email='$email'
        ");

        $message="<div class='alert alert-success'>
        Password Updated Successfully.
        <a href='login.php'>Login Now</a>
        </div>";
    }
    else
    {
        $message="<div class='alert alert-danger'>
        Email Not Found.
        </div>";
    }
}
?>

<!DOCTYPE html>

<html>

<head>

<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5 mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Forgot Password</h3>

</div>

<div class="card-body">

<?php echo $message; ?>

<form method="POST">

<label>Email</label>

<input
type="email"
name="email"
class="form-control mb-3"
required>

<label>New Password</label>

<input
type="password"
name="password"
class="form-control mb-3"
required>

<button
class="btn btn-primary w-100"
name="reset">

Update Password

</button>

</form>

<br>

<a href="login.php">

Back to Login

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
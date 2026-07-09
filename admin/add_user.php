<?php
include "../includes/header.php";

if(isset($_POST['save']))
{
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users(fullname,email,password,phone,role)
    VALUES('$name','$email','$password','$phone','$role')");

    header("Location:users.php");
}
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>Add User</h4>

</div>

<div class="card-body">

<form method="POST">

<input type="text" name="fullname" class="form-control mb-3" placeholder="Full Name" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

<select name="role" class="form-control mb-3">

<option value="student">Student</option>

<option value="faculty">Faculty</option>

<option value="admin">Admin</option>

</select>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-success" name="save">

Save User

</button>

<a href="users.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
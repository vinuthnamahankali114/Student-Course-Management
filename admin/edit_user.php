<?php
include "../includes/header.php";

$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id='$id'"));

if(isset($_POST['update']))
{
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];

    mysqli_query($conn,"UPDATE users SET

    fullname='$name',

    email='$email',

    phone='$phone',

    role='$role'

    WHERE id='$id'");

    header("Location:users.php");
}
?>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit User</h4>

</div>

<div class="card-body">

<form method="POST">

<input
type="text"
name="fullname"
class="form-control mb-3"
value="<?= $data['fullname']; ?>">

<input
type="email"
name="email"
class="form-control mb-3"
value="<?= $data['email']; ?>">

<input
type="text"
name="phone"
class="form-control mb-3"
value="<?= $data['phone']; ?>">

<select name="role" class="form-control mb-3">

<option <?= $data['role']=='student'?'selected':''; ?>>student</option>

<option <?= $data['role']=='faculty'?'selected':''; ?>>faculty</option>

<option <?= $data['role']=='admin'?'selected':''; ?>>admin</option>

</select>

<button class="btn btn-warning" name="update">

Update

</button>

<a href="users.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>
<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['id']))
{
    header("Location:../login.php");
    exit();
}

$id=$_SESSION['id'];

$user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id='$id'"));

if(isset($_POST['update']))
{
    $name=mysqli_real_escape_string($conn,$_POST['fullname']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);

    $photo=$user['profile_pic'];

    if(!empty($_FILES['photo']['name']))
    {
        $photo=time()."_".$_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'],"../uploads/profile/".$photo);
    }

    mysqli_query($conn,"
    UPDATE users
    SET
    fullname='$name',
    phone='$phone',
    profile_pic='$photo'
    WHERE id='$id'
    ");

    echo "<script>
    alert('Profile Updated Successfully');
    window.location='profile.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>My Profile</h3>

</div>

<div class="card-body">

<div class="text-center">

<img
src="../uploads/profile/<?php echo $user['profile_pic']; ?>"
width="150"
height="150"
class="rounded-circle border">

</div>

<br>

<form method="POST" enctype="multipart/form-data">

<label>Full Name</label>

<input
type="text"
name="fullname"
class="form-control mb-3"
value="<?php echo $user['fullname']; ?>">

<label>Email</label>

<input
type="email"
class="form-control mb-3"
value="<?php echo $user['email']; ?>"
readonly>

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control mb-3"
value="<?php echo $user['phone']; ?>">

<label>Profile Picture</label>

<input
type="file"
name="photo"
class="form-control mb-3"
accept="image/*">

<button
class="btn btn-success"
name="update">

Update Profile

</button>

<a href="dashboard.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</body>

</html>
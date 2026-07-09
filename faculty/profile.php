<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

if(session_status()==PHP_SESSION_NONE)
{
    session_start();
}

include "../config/db.php";

if(!isset($_SESSION['id']) || $_SESSION['role']!="faculty")
{
    header("Location:../login.php");
    exit();
}

$id=$_SESSION['id'];

$query=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
$user=mysqli_fetch_assoc($query);

if(isset($_POST['update']))
{
    $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);

    $photo=$user['profile_pic'];

    if(isset($_FILES['photo']) && $_FILES['photo']['name']!="")
    {
        $photo=time()."_".$_FILES['photo']['name'];

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "../uploads/profile/".$photo
        );
    }

    mysqli_query($conn,"
    UPDATE users
    SET
    fullname='$fullname',
    phone='$phone',
    profile_pic='$photo'
    WHERE id='$id'
    ");

    $_SESSION['name']=$fullname;

    echo "<script>
    alert('Profile Updated Successfully');
    window.location='profile.php';
    </script>";

    exit();
}

$query=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
$user=mysqli_fetch_assoc($query);

if(empty($user['profile_pic']))
{
    $user['profile_pic']="default.png";
}
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Faculty Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f5f5;
}

.profile-card{
    max-width:700px;
    margin:auto;
    margin-top:40px;
}

.profile-img{
    width:170px;
    height:170px;
    border-radius:50%;
    border:5px solid #198754;
    object-fit:cover;
}

</style>

</head>

<body>

<div class="container">

<div class="card shadow profile-card">

<div class="card-header bg-success text-white">

<h3>

<i class="fas fa-user-circle"></i>

Faculty Profile

</h3>

</div>

<div class="card-body">

<div class="text-center mb-4">

<img
src="../uploads/profile/<?php echo $user['profile_pic']; ?>"
class="profile-img">

</div>

<form method="POST" enctype="multipart/form-data">

<label class="fw-bold">

Full Name

</label>

<input
type="text"
name="fullname"
class="form-control mb-3"
value="<?php echo $user['fullname']; ?>"
required>

<label class="fw-bold">

Email

</label>

<input
type="email"
class="form-control mb-3"
value="<?php echo $user['email']; ?>"
readonly>

<label class="fw-bold">

Phone Number

</label>

<input
type="text"
name="phone"
class="form-control mb-3"
value="<?php echo $user['phone']; ?>">

<label class="fw-bold">

Profile Picture

</label>

<input
type="file"
name="photo"
class="form-control mb-4"
accept="image/*">

<div class="d-flex justify-content-between">

<button
type="submit"
name="update"
class="btn btn-success">

<i class="fas fa-save"></i>

Update Profile

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Back to Dashboard

</a>

</div>

</form>

</div>

</div>

</div>

</body>

</html>
<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

$result = mysqli_query($conn,"SELECT * FROM users ORDER BY id DESC");
?>

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">Manage Users</h4>

</div>

<div class="card-body">

<a href="add_user.php" class="btn btn-success mb-3">
<i class="fas fa-plus"></i> Add User
</a>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['fullname']; ?></td>

<td><?= $row['email']; ?></td>

<td><?= $row['phone']; ?></td>

<td><?= ucfirst($row['role']); ?></td>

<td>

<a href="edit_user.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">

Edit

</a>

<a href="delete_user.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this user?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include "../includes/footer.php"; ?>
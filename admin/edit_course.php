<?php
include "../includes/header.php";

if (!isset($_GET['id'])) {
    header("Location: courses.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM courses WHERE id='$id'");
$course = mysqli_fetch_assoc($result);

if (!$course) {
    echo "<script>alert('Course not found'); window.location='courses.php';</script>";
    exit();
}

if (isset($_POST['update'])) {

    $name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $code = mysqli_real_escape_string($conn, $_POST['course_code']);
    $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
    $credits = mysqli_real_escape_string($conn, $_POST['credits']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    mysqli_query($conn, "UPDATE courses SET
        course_name='$name',
        course_code='$code',
        faculty='$faculty',
        credits='$credits',
        description='$description',
        semester='$semester',
        status='$status'
        WHERE id='$id'
    ");

    echo "<script>
        alert('Course Updated Successfully');
        window.location='courses.php';
    </script>";
}
?>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Edit Course</h4>
        </div>

        <div class="card-body">

            <form method="POST">

                <label class="form-label">Course Name</label>
                <input
                    type="text"
                    name="course_name"
                    class="form-control mb-3"
                    value="<?php echo $course['course_name']; ?>"
                    required>

                <label class="form-label">Course Code</label>
                <input
                    type="text"
                    name="course_code"
                    class="form-control mb-3"
                    value="<?php echo $course['course_code']; ?>"
                    required>

                <label class="form-label">Faculty Name</label>
                <input
                    type="text"
                    name="faculty"
                    class="form-control mb-3"
                    value="<?php echo $course['faculty']; ?>"
                    required>

                <label class="form-label">Credits</label>
                <input
                    type="number"
                    name="credits"
                    class="form-control mb-3"
                    value="<?php echo $course['credits']; ?>"
                    required>

                <label class="form-label">Description</label>
                <textarea
                    name="description"
                    class="form-control mb-3"
                    rows="4"><?php echo $course['description']; ?></textarea>

                <label class="form-label">Semester</label>
                <select name="semester" class="form-control mb-3">

                    <option value="1-1" <?php if($course['semester']=="1-1") echo "selected"; ?>>1-1</option>
                    <option value="1-2" <?php if($course['semester']=="1-2") echo "selected"; ?>>1-2</option>
                    <option value="2-1" <?php if($course['semester']=="2-1") echo "selected"; ?>>2-1</option>
                    <option value="2-2" <?php if($course['semester']=="2-2") echo "selected"; ?>>2-2</option>
                    <option value="3-1" <?php if($course['semester']=="3-1") echo "selected"; ?>>3-1</option>
                    <option value="3-2" <?php if($course['semester']=="3-2") echo "selected"; ?>>3-2</option>
                    <option value="4-1" <?php if($course['semester']=="4-1") echo "selected"; ?>>4-1</option>
                    <option value="4-2" <?php if($course['semester']=="4-2") echo "selected"; ?>>4-2</option>

                </select>

                <label class="form-label">Status</label>
                <select name="status" class="form-control mb-4">

                    <option value="Active" <?php if($course['status']=="Active") echo "selected"; ?>>Active</option>

                    <option value="Inactive" <?php if($course['status']=="Inactive") echo "selected"; ?>>Inactive</option>

                </select>

                <button type="submit" name="update" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Update Course
                </button>

                <a href="courses.php" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

<?php include "../includes/footer.php"; ?>
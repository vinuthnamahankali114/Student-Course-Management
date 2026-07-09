<?php
include "../includes/header.php";
include "../includes/sidebar.php";
include "../includes/topbar.php";

// Dashboard Statistics
$totalStudents = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role='student'"));
$totalFaculty = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE role='faculty'"));
$totalUsers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$totalCourses = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM courses"));
$totalEnrollments = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM enrollments"));
$totalAttendance = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM attendance"));
?>

<div class="container-fluid">

    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                    <h5>Total Users</h5>
                    <h2><?php echo $totalUsers; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                    <h5>Students</h5>
                    <h2><?php echo $totalStudents; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body text-center">
                    <h5>Faculty</h5>
                    <h2><?php echo $totalFaculty; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body text-center">
                    <h5>Courses</h5>
                    <h2><?php echo $totalCourses; ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                    <h5>Enrollments</h5>
                    <h2><?php echo $totalEnrollments; ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body text-center">
                    <h5>Attendance Records</h5>
                    <h2><?php echo $totalAttendance; ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mt-4">

        <div class="card-header bg-dark text-white">
            <h4>Campus Analytics</h4>
        </div>

        <div class="card-body">
            <canvas id="dashboardChart"></canvas>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('dashboardChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Users',
            'Students',
            'Faculty',
            'Courses',
            'Enrollments',
            'Attendance'
        ],

        datasets: [{

            label: 'Campus Statistics',

            data: [

                <?php echo $totalUsers; ?>,
                <?php echo $totalStudents; ?>,
                <?php echo $totalFaculty; ?>,
                <?php echo $totalCourses; ?>,
                <?php echo $totalEnrollments; ?>,
                <?php echo $totalAttendance; ?>

            ]

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: true

            }

        }

    }

});

</script>

<?php include "../includes/footer.php"; ?>
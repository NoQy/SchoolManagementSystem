<?php
session_start();

if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: login.php");
}

// Deleted
if (isset($_GET['deleted'])) {
    echo "<script type='text/javascript'> alert('Successfuly Deleted!') </script>";
}
if (isset($_GET['not_deleted'])) {
    echo "<script type='text/javascript'> alert('Not Deleted!') </script>";
}

include 'db_conncet.php';
$sql = "SELECT * FROM users WHERE usertype = 'student'";
$resul = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <?php include 'styles.php' ?>
    <style>
        #view-student {
            color: #0099cc;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="main container-fluid">
        <div class="row">

            <!--==================== Sidebar ======================-->
            <?php include 'sidebar.php' ?>


            <div class="main-content mt-4 ml-4 w-75">


                <div class="container ">

                    <h2 class="py-3">View Students</h2>

                    <table class="table table-striped table-bordered table-secondary">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = $resul->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo "{$data['ID']}"; ?></td>
                                    <td><?php echo "{$data['username']}"; ?></td>
                                    <td><?php echo "{$data['email']}"; ?></td>
                                    <td><?php echo "{$data['phone']}"; ?></td>
                                    <td><?php echo "{$data['password']}"; ?></td>
                                    <td><?php echo "
                                    <a href='update_student.php?id={$data['ID']}' class='btn btn-sm btn-primary'>
                                        Edit
                                    </a>
                                    "; ?></td>
                                    <td><?php echo "
                                    <a onclick='return confirm(\"Are you sure?\")' href='delete_student.php?id={$data['ID']}' class='btn btn-sm btn-danger'>
                                        Delete
                                    </a>
                                    "; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>
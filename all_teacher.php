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
$sql = "SELECT * FROM teachers ";
$resul = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Teachers</title>
    <?php include 'styles.php' ?>
    <style>
        #all-teacher {
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

                    <h2 class="py-3">All Teachers</h2>

                    <table class="table table-striped table-bordered table-secondary">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = $resul->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo "{$data['ID']}"; ?></td>
                                    <td><?php echo "{$data['Name']}"; ?></td>
                                    <td><?php echo "{$data['Description']}"; ?></td>
                                    <td><img src="<?php echo "{$data['Image']}"; ?>" alt="T-IMG"></td>
                                    <td><?php echo "
                                    <a href='edit_teacher.php?id={$data['ID']}' class='btn btn-sm btn-primary'>
                                        Edit
                                    </a>
                                    "; ?></td>
                                    <td><?php echo "
                                    <a onclick='return confirm(\"Are you sure?\")' href='delete_teacher.php?id={$data['ID']}' class='btn btn-sm btn-danger'>
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
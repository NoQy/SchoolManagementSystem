<?php
session_start();

if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: login.php");
}

include 'db_conncet.php';
$sql = "SELECT * FROM admission";
$resul = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>

    <?php include 'styles.php' ?>
    <style>
        #admission {
            color: #0099cc;
        }
    </style>


</head>

<body>

    <!--==================== Start of navbar ======================-->
    <?php include 'navbar.php' ?>
    <!--==================== END of navbar ======================-->


    <!--==================== Start of main ======================-->
    <div class="main container-fluid">
        <div class="row">

            <!--==================== Sidebar ======================-->
            <?php include 'sidebar.php' ?>


            <div class="main-content mt-4 ml-4 w-75">


                <div class="container ">

                    <h2 class="py-3">Admission</h2>

                    <table class="table table-striped table-bordered table-primary">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = $resul->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo "{$data['name']}"; ?></td>
                                    <td><?php echo "{$data['email']}"; ?></td>
                                    <td><?php echo "{$data['phone']}"; ?></td>
                                    <td><?php echo "{$data['message']}"; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <!--==================== END of main-content ======================-->








    <?php include 'js.php' ?>
</body>

</html>
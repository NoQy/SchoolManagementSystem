<?php
session_start();
if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <?php include 'styles.php' ?>




</head>

<body>

    <?php include 'navbar.php' ?>

    <!--==================== Start of main ======================-->
    <div class="main container-fluid">
        <div class="row">

            <!-- ---- side bar -------  -->
            <?php include 'sidebar.php' ?>

            <div class="content col-md-10 pl-5 mt-2">
                <h1 class="mt-5 ">Sidebar acordion </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint fugit perspiciatis officia? Corrupti consectetur totam possimus, vel asperiores eveniet harum consequatur, tempore eos expedita, nisi pariatur dolor itaque molestias nulla.
                </p>
            </div>
        </div>
    </div>
    <!--==================== Start of main ======================-->








    <?php include 'js.php' ?>
</body>

</html>
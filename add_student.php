<?php
session_start();
include 'db_conncet.php';

if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: ./login.php");
}

$_SESSION['success'] = "";


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $usertype = "student";
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    // Check phone No
    $check = "SELECT * FROM users WHERE phone = '$phone'";
    $check_phone = mysqli_query($conn, $check);
    $row_count = mysqli_num_rows($check_phone);
    if ($row_count > 0) {
        echo "<script type='text/javascript'> alert('Phone Already Exist!') </script>";
        return false;
    }

    $sql = "INSERT INTO users (username, email, phone, usertype, password)
    VALUES ('$username', '$email', '$phone', '$usertype', '$password1')";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['success'] = "Data successfuly inserted!";
        // echo "<script type='text/javascript'> alert('Applying Success') </script>";
    } else {
        echo "<script type='text/javascript'> alert('Applying Not Success') </script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>

    <?php include 'styles.php' ?>
    <style>
        #add-student {
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


            <div class="main-content mt-4 w-75">
                <div class="container ml-4">
                    <div class="row ">
                        <div class="col-md-12">
                            <h2 class="py-3">Add New Student</h2>

                            <form action="#" method="POST" class="d-flex flex-wrap was-validated">

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label for="name">Username:</label>
                                        <input type="text" class="form-control" placeholder="Enter username" id="name" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" placeholder="Enter email address" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="password1" name="password1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Confrim password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="password2" name="password2" required>
                                    </div>
                                </div>
                                <div class="w-100 d-flex">
                                    <div class="form-group col-6">
                                        <label for="phone">Phone:</label>
                                        <input type="tel" class="form-control" placeholder="Enter phone number" id="phone" name="phone" required>
                                    </div>

                                    <div class="w-100 text-center col-6 mt-5">
                                        <button type="submit" name="submit" class="btn btn-primary rounded w-75">Add</button>
                                    </div>
                                </div>

                            </form>
                            <h4 class="text-center mt-5 text-success">
                                <?php
                                if (isset($_SESSION['success'])) {
                                    echo "{$_SESSION['success']}";
                                }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
            <!--==================== END of main-content ======================-->








            <?php include 'js.php' ?>
</body>

</html>
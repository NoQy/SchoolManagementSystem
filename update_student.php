<?php
session_start();
include 'db_conncet.php';

if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: login.php");
}

$_SESSION['success'] = "";

$id = $_GET['id'];
$sel = "SELECT * FROM users WHERE ID ='$id'";
$result = mysqli_query($conn, $sel);
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $usertype = "student";
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $qr = "UPDATE users SET username='$username', email='$email',
     phone='$phone', password='$password1' WHERE ID='$id'";

    $up = mysqli_query($conn, $qr);
    if ($up) {
        $sucess = "Successfuly Updated";
        $_SESSION['success'] = $sucess;
    } else {
        echo "Not updated!";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update student</title>

    <?php include 'styles.php' ?>


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
                            <h2 class="py-3">Update Students</h2>

                            <form action="#" method="POST" class="d-flex flex-wrap was-validated">

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label for="name">Username:</label>
                                        <input type="text" class="form-control" placeholder="Enter username" id="name" name="username" value="<?php echo "{$data['username']}"; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" placeholder="Enter email address" id="email" name="email" value="<?php echo "{$data['email']}"; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="password1" name="password1" value="<?php echo "{$data['password']}"; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Confrim password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" id="password2" name="password2" value="<?php echo "{$data['password']}"; ?>" required>
                                    </div>
                                </div>
                                <div class="w-100 d-flex">
                                    <div class="form-group col-6">
                                        <label for="phone">Phone:</label>
                                        <input type="tel" class="form-control" placeholder="Enter phone number" id="phone" name="phone" value="<?php echo "{$data['phone']}"; ?>" required>
                                    </div>

                                    <div class="w-100 text-center col-6 mt-5">
                                        <button type="submit" name="submit" class="btn btn-secondary rounded w-75">Update</button>
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
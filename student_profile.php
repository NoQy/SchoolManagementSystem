<!DOCTYPE html>
<?php
session_start();
include 'db_conncet.php';
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == "admin") {
    header("location: login.php");
}

// first empty the success msg.
$_SESSION['success'] = "";


// Getting login username
$name = $_SESSION['username'];
$qr = "SELECT * FROM users WHERE username = '$name'";
$res = mysqli_query($conn, $qr);
$data = mysqli_fetch_assoc($res);

// Check if update button clicked
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $usertype = "student";
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $qr = "UPDATE users SET username='$username', email='$email',
     phone='$phone', password='$password1' WHERE username='$name'";

    $up = mysqli_query($conn, $qr);
    if ($up) {
        $sucess = "Successfuly Updated";
        $_SESSION['success'] = $sucess;
    } else {
        echo "Not updated!";
    }
}




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <?php include 'styles.php'; ?>
    <style>
        #profile {
            color: #0099cc;
        }
    </style>
</head>

<body>
    <?php include 'student_navbar.php'; ?>


    <!--==================== Start of main ======================-->
    <div class="main container-fluid">
        <div class="row">

            <!-- ---- side bar -------  -->
            <?php include 'student_sidebar.php' ?>

            <div class="main-content mt-4 w-75">
                <div class="container ml-4">
                    <div class="row ">
                        <div class="col-md-12">
                            <h2 class="py-3">Update Profile</h2>

                            <form action="#" method="POST" class="d-flex flex-wrap was-validated">

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label for="name">Name:</label>
                                        <input spellcheck="false" type="text" class="form-control" placeholder="Enter username" id="name" name="username" value="<?php echo "{$data['username']}"; ?>" required>
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
                                        <button type="submit" name="update" class="btn btn-primary rounded w-75">Update</button>
                                    </div>
                                </div>

                            </form>
                            <h4 class="text-center mt-5 text-success">
                                <?php
                                if (isset($_SESSION['success'])) {
                                    echo "{$_SESSION['success']}";
                                }
                                ?>
                                </h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================== Start of main ======================-->




    <?php include 'js.php' ?>

</body>

</html>
<!DOCTYPE html>
<html>

<head>

    <title>School Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="text/css" rel="stylesheet" href="css/all.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/loginStyle.css">

</head>

<body>

    <!--==================== START of Form ======================-->
    <section class="login my-3 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 bg-info rounded text-light p-4 mt-5">
                    <h2 class="text-center py-3 bg-dark">Login Form</h2>

                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="text">Username:</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" id="password">
                        </div>
                        <div class="w-100 text-center">
                            <button type="submit" name="submit" class="btn btn-secondary rounded w-50">Login</button>
                        </div>
                    </form>
                    <deiv class="text-center ">
                        <p class="text-center pt-2">
                            <?php
                            // error_reporting(0);
                            session_start();
                            session_destroy();
                            echo $_SESSION['errMsg'];
                            ?>
                        </p>
                    </deiv>

                </div>
            </div>
        </div>
    </section>
    <!--==================== END of From ======================-->





    <!--==================== START of PHP codes ======================-->
    <?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "SMS3";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if ($conn === false) {
        die("Con not connect");
    }

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $passsword = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password = '$passsword'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if ($row['usertype'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = "admin";
            header("location: admin_home.php");
        } elseif ($row['usertype'] == "student") {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = "student";
            header("location: student_home.php");
        } else {
            session_start();
            $errMesg = "<p style='color: #a31919e2;'>Icnorrect username or password!</p>";
            $_SESSION['errMsg'] = $errMesg;
            header("location: login.php");
        }
    }
    ?>
    <!--==================== END of PHP codes ======================-->


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
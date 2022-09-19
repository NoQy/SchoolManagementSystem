<?php
session_start();
include 'db_conncet.php';

if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: login.php");
}

$_SESSION['success'] = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];


    $file = $_FILES['image']['name'];
    $dist = "./images/users/";
    $image = "images/users/$file";

    move_uploaded_file($_FILES['image']['tmp_name'], $dist);



    $sql = "INSERT INTO teachers (Name, Description, Image) VALUES ('$name', '$desc', '$image')";

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
    <title>Add Teacher</title>

    <?php include 'styles.php' ?>
    <style>
        #add-teacher {
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
                            <h2 class="py-3">Add New Teacher</h2>

                            <form action="#" enctype="multipart/form-data" method="POST" class="d-flex flex-wrap was-validated">

                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Teacher Name" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Description:</label>
                                        <textarea rows="4" class="form-control" placeholder="Enter description" id="description" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Choice your image:</label>
                                        <input type="file" accept=".jpg, .png, .jpeg" class="form-control" placeholder="Enter Image" id="image" name="image" required>
                                    </div>

                                    <div class="pt-3 mt-5 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary rounded w-100">Add</button>
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
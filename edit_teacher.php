<?php
session_start();
include 'db_conncet.php';

if (!isset($_SESSION['username']) or $_SESSION['usertype'] == "student") {
    header("location: login.php");
}

$_SESSION['success'] = "";

$id = $_GET['id'];
$sel = "SELECT * FROM teachers WHERE ID ='$id'";
$result = mysqli_query($conn, $sel);
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];

    $file = $_FILES['image']['name'];
    $dist = "./images/users/";
    $image = "images/users/$file";

    move_uploaded_file($_FILES['image']['tmp_name'], $dist);


    $qr = "UPDATE teachers SET Name='$name', Description='$desc' Image='$image' WHERE ID='$id'";

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
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Teacher Name" id="name" name="name" value="<?php echo "{$data['Name']}"; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Description:</label>
                                        <textarea type="text" rows="3" class="form-control" placeholder="Enter Teacher Description" id="desc" name="desc" required><?php echo "{$data['Description']}"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Old Image:</label>
                                        <img class="form-control src=" <?php echo "{$data['Image']}"; ?>" alt="O-t-image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">New Image:</label>
                                        <input type="file" class="form-control" accept=".jpg, .png, .jpeg" id="image" name="image" value="" required>
                                    </div>
                                </div>
                                <div class="form-group w-25 text-center">
                                    <button type="submit" name="submit" class="btn btn-info rounded w-75">Update</button>
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
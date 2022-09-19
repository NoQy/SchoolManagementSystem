    <!--==================== START of PHP codes ======================-->

    <?php
    include 'db_conncet.php';

    // User for getting teachers
    $qr = "SELECT * FROM teachers";
    $resul = mysqli_query($conn, $qr);




    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $sql = "INSERT INTO admission (name, email, phone, message)
        VALUES ('$name', '$email', '$phone', '$message')";
        echo "$sql <br> $name <br> $email <br>";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'> alert('Admission Success') </script>";
        } else {
            echo "<script type='text/javascript'> alert('Admission Failed') </script>";
        }
    }
    ?>



    <!DOCTYPE html>
    <html>

    <head>

        <title>School Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link type="text/css" rel="stylesheet" href="css/all.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <!--==================== Start of navbar ======================-->
        <nav class="navbar navbar-expand-sm bg-dark">

            <div class="container">
                <a class="navbar-brand" href="#">W-School</a>
                <!-- Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="login.php">Login</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!--==================== END of navbar ======================-->


        <!--==================== START of image section ======================-->
        <section class="section1">
            <label class="label">
                We <label class="bg-danger py-3 px-1">Teach</label> Students with Care</label>
            <img src="images/about_2.jpg" class="img-header w-100" alt="alt" />
        </section>
        <!--==================== END of image section ======================-->



        <!--==================== START of about us ======================-->
        <section class="about-us my-5 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="images/blog_4.jpg" class="w-100" alt="" srcset="">
                    </div>

                    <div class="col-md-7">
                        <h2 class="h2 mt-5">Welcome to W-School</h2>
                        <p class="text-muted">
                            Use any of the .bg-color classes to change the background color of the navbar (.bg-primary,
                            .bg-success, .bg-info,
                            .bg-warning, .bg-danger, .bg-secondary, .bg-dark and .bg-light) Tip: Add a white text color to
                            all links in the navbar with the .navbar-dark class, or use the .navbar-light class to add a
                            black text color.
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!--==================== END of about us ======================-->




        <!--==================== START of Teachers ======================-->
        <section class="teachers my-3 pt-3">
            <div class="container">
                <h2 class="text-center py-3">Our Teachers</h2>
                <div class="row">

                    <?php while ($data = $resul->fetch_assoc()) { ?>
                        <div class="col-md-4">
                            <img src="<?php echo "{$data['Image']}"; ?>" class="w-100" alt="Teacher image">
                            <h3><?php echo "{$data['Name']}"; ?></h3>
                            <label class="text-muted">
                                <?php echo "{$data['Description']}"; ?>
                            </label>
                        </div>
                    <?php } ?>

                    <!-- <div class="col-md-4">
                        <img src="images/users/m1.jpg" style="display: block; width: 50px;" alt="alter" srcset="">
                        <h3>Hamid</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum molestiae libero expedita reiciendis aliquam architecto labore quibusdam earum accusantium veritatis ratione, autem voluptatem fugiat doloribus non obcaecati et repudiandae quae?

                        </p>
                    </div> -->

                </div>
            </div>
        </section>
        <!--==================== END of Teachers ======================-->



        <!--==================== START of Courses ======================-->
        <section class="courses ">
            <div class="container">
                <h2 class="text-center py-3">Our Courses</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/portfolio-1.jpg" class="w-100" alt="" srcset="">
                        <label class="text-muted h4 py-2">
                            Graphic Designing
                        </label>
                    </div>

                    <div class="col-md-4">
                        <img src="images/portfolio-2.jpg" class="w-100" alt="" srcset="">
                        <label class="text-muted h4 py-2">
                            Web Designing
                        </label>
                    </div>

                    <div class="col-md-4">
                        <img src="images/portfolio-3.jpg" class="w-100" alt="" srcset="">
                        <label class="text-muted h4 py-2">
                            Markating
                        </label>
                    </div>

                </div>
            </div>
        </section>
        <!--==================== END of courses ======================-->



        <!--==================== START of Form ======================-->
        <section class="admissions my-3 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <h2 class="text-center py-3">Addmission From</h2>

                        <form action="#" method="POST">
                            <div class=" form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control" placeholder="Enter phone number" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" rows="4" placeholder="Write Message" id="message" name="message"></textarea>
                            </div>
                            <div class="w-100 text-center">
                                <button type="submit" class="btn btn-primary rounded w-50">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--==================== END of From ======================-->




        <!--==================== START of Footer ======================-->
        <section class="footer bg-dark text-light py-5 ">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <p>
                        &copy; All right reserved by Programmers
                    </p>
                </div>
            </div>
        </section>
        <!--==================== END of Footer ======================-->



        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
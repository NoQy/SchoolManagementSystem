<?php

require 'db_conncet.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qr = "DELETE FROM users WHERE ID = '$id'";

    $result = mysqli_query($conn, $qr);

    if ($result > 0) {
        header("location: view_student.php?deleted");
    } else {
        header("location: view_student.php?not_deleted");
    }
}

<?php

require 'db_conncet.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qr = "DELETE FROM teachers WHERE ID = '$id'";

    $result = mysqli_query($conn, $qr);

    if ($result > 0) {
        header("location: all_teacher.php?deleted");
    } else {
        header("location: all_teacher.php?not_deleted");
    }
}

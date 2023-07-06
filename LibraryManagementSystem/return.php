<?php
include_once("studentsession.php");
if (isset($_POST['save'])) {
    # code...
    $id = $_POST['id'];

    $query = "UPDATE barrowed set status = 2 where book_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $qquery = "UPDATE barrowed set status = 2 where book_id='$id' ";
        $query_runn = mysqli_query($connection, $qquery);
        if ($query_runn) {
            $_SESSION['status'] = "Return Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: barrowedbooks.php");
        } else {
            echo 'not deleted';
        }
    }
}

<?php
include_once("session.php");
$connection = connection();
if (isset($_POST['save'])) {
    # code...
    $id = $_POST['id'];
    $student = $_POST['student'];
    $barrowed = $_POST['barrowed'];
    $time_in = $_POST['time_in'];
    $query = "SELECT * FROM barrowed where book_id='$id' and status = 2";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $queryy = "INSERT INTO `history`(`barrowed_id`, `Student_id`, `book_id`, `time_in`,  `time_out`) VALUES ('$barrowed','$student','$id','$time_in',NOW())";
        $query_runn = mysqli_query($connection, $queryy);
        if ($query_runn) {
            $qqueryyy = "DELETE from barrowed where barrowed_id='$barrowed' ";
            $query_runnn = mysqli_query($connection, $qqueryyy);
            if ($query_runnn) {
            $_SESSION['status'] = "Return Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: book.php");
            }
        } else {
            echo 'not deleted';
        }
    }
}

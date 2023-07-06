<?php
include('../studentsession.php');
$connection = connection();
if (isset($_POST['text'])) {

    $bookid = $_POST['text'];
   
    $query1 = mysqli_query($connection, "SELECT * from barrowed where book_id = '$bookid'");
    if (mysqli_num_rows($query1) > 0) {
        echo "<script>alert('book already Taken');</script>";
        echo ('<script>location.href = "qrscan.php"</script>');
    } else {
        $query13 = mysqli_query($connection, "select * from books where book_id = '$bookid'");
        if (mysqli_num_rows($query13) < 1) {
            echo "<script>alert('Serial Number is not correct');</script>";
            echo ('<script>location.href = "qrscan.php"</script>');
        } else {
        $queryyy = mysqli_query($connection, "select * from books where book_id = '$bookid'") or die($connection->error);
        while ($row = mysqli_fetch_array($queryyy)) {
         $book_name = $row['name'];

        }
        echo "<script>alert('You barrowed $book_name');</script>";
        mysqli_query($connection, "INSERT into barrowed (Student_id, book_id,time_in,status) values ('$session_id','$bookid',NOW(),'1')")or die($connection->error);
        echo ('<script>location.href = "../studenthome.php"</script>');
        
    }
}
}
?>
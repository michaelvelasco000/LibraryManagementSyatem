<?php
include_once("../connection.php");
$connection = connection();
include('session.php');
$get_id = $_GET['id'];
$query = mysqli_query($connection, "select * from admin where id='$session_id'") or die($connection->error);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>


</head>
<style>
    #qrcode {
  width:160px;
  height:160px;
  margin-top:15px;
}
</style>
<body>

    <?php include('navbar.php'); ?>

        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-3">
                    
                        <h1 class="">Textbooks</h1> <a id="e<?php echo $book_name; ?>" href="print.php<?php echo '?id=' . $get_id; ?>" class="btn btn-success"><i class="bx bxs-edit"></i>&nbsp;Print</a>
                         <?php
                                $query = "SELECT * FROM books where name = '$get_id' ";
                                $query_run = mysqli_query(
                                    $connection,
                                    $query
                                );

                                if (
                                    $user_total = mysqli_num_rows(
                                        $query_run
                                    )
                                ) {
                                    echo '<h4 class="mb-0">Total: ' .
                                        $user_total .
                                        '</h4>';
                                }
                                ?>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
       
               $query = mysqli_query($connection, "select * from books where name = '$get_id' ") or die($connection->error);
               while ($row = mysqli_fetch_array($query)) {
                   $student_id = $row['book_id'];
               ?>


                                    <tr>
                                        
                                        <td><?php echo $row['book_id'] ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-md " title="Delete Teacher" data-toggle="modal" data-target="#delete<?php echo $teacher_id ?>"><i class='bx bxs-archive'></i> </button>

                                        </td>

                                    </tr>



                                <?php
                               
                                } ?>

                            </tbody>
                        </table>

                    </div>
            
        </div>
    </div>
 </div> 


</body>

</html>



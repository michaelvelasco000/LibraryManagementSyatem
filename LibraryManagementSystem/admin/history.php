<?php
include_once("../connection.php");
$connection = connection();
include('session.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barrowed Textbook</title>


</head>
</style>


<body>

    <?php include('navbar.php'); ?>

        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                        <h1 class="">Barrowed Textbooks</h1>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>
                                <th>Student Name</th>
                                <th>Serial Number</th>            
                                <th>Book Name</th>           
                                <th>Date Barrowed</th>
                                <th>Date Returned</th>
                            
                            </thead>
                            <tbody>
                            <?php
                                    $query = mysqli_query($connection, "select * from history") or die($connection->error);
                                    $userTotal = mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_array($query)) {

                                        $student_query = mysqli_query($connection, "select * from students where Student_id='" . $row['Student_id'] . "'") or die($connection->error);
                                        $student_row = mysqli_fetch_array($student_query);

                                        $student_queryy = mysqli_query($connection, "select * from books where book_id='" . $row['book_id'] . "'") or die($connection->error);
                                        $book_row = mysqli_fetch_array($student_queryy);
                                         $book=$book_row['name'];
                                    ?>

                                        <tr class="odd gradeX" id="username">

                                            <td><h6>&nbsp;<?php echo $student_row['name']?></h6>
                                            </td>
                                            <td><h6>&nbsp;<?php echo $book_row['book_id']?></h6>
                                            </td>
                                            <td><h6>&nbsp;<?php echo $book_row['name']?></h6>
                                            </td>
                                            <td><h6>&nbsp;<?php echo $row['time_in']?></h6>
                                            </td>
                                            <td><h6>&nbsp;<?php echo $row['time_out']?></h6>
                                            </td>
                                            <!-- end delete modal -->
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
<!-- Modal -->


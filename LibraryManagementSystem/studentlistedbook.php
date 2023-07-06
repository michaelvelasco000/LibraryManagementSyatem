<?php
include_once("connection.php");
$connection = connection();
include('studentsession.php');
$get_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>


</head>




<body>

    <?php include('studentnavbar.php'); ?>
    
    <main id="content">
        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-3">
                    
                        <h1 class="">Textbooks</h1>
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
                                <th>Status</th>
                            </thead>
                            <tbody>

                            <?php
               $query = mysqli_query($connection, "select * from books where name = '$get_id' ") or die($connection->error);
               while ($row = mysqli_fetch_array($query)) {
                   $book_id = $row['book_id'];
               ?>


                                    <tr>
                                        
                                        <td><?php echo $row['book_id'] ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>    
                                            <?php

                                     
                    $queryy = mysqli_query($connection, "select * from barrowed where book_id = '$book_id' ") or die($connection->error);
                    while ($roww = mysqli_fetch_array($queryy)) {
                        $status = $roww['status'];
                        $book = $roww['book_id'];
                        
                        if($status == 1){ echo "Not Available";
                                                }else {
                                                    echo "Returning";  }   
                                                                
                                        }                      
                                            
                                            ?>
                                         </td>   
                                         <?php
                    
                } ?>
                                    </tr>



                                <?php
                    
                                ?>

                            </tbody>
                        </table>

                    </div>
            
        </div>
    </div>
 </div> 
         
    </main>

</body>

</html>



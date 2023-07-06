<?php
include_once("connection.php");
$connection = connection();
include('studentsession.php');

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

    <?php include('studentnavbar.php'); ?>

        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                        <h1 class="">Barrowed Textbooks</h1>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>
                                <th>Serial Number</th> 
                                <th>Book Name</th>           
                                <th>Date Barrowed</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                                    $query = mysqli_query($connection, "select * from barrowed where Student_id = '$session_id'") or die($connection->error);
                                    $userTotal = mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $status=$row['status'];
                                        $student_query = mysqli_query($connection, "select * from students where Student_id='" . $row['Student_id'] . "'") or die($connection->error);
                                        $student_row = mysqli_fetch_array($student_query);

                                        $student_queryy = mysqli_query($connection, "select * from books where book_id='" . $row['book_id'] . "'") or die($connection->error);
                                        $book_row = mysqli_fetch_array($student_queryy);
                                         $book=$book_row['name'];
                                    ?>

                                        <tr class="odd gradeX" id="username">


                                            <td><h6>&nbsp;<?php echo $book_row['book_id']?></h6>
                                            </td>
                                            <td><h6>&nbsp;<?php echo $book_row['name']?></h6>
                                            </td>
                                            <td><h6>&nbsp;<?php echo $row['time_in']?></h6>
                                            </td>
                                            <td>
                                                <?php
                                            if($status==2){
                                                echo "Pending";
                                            
                                            }else{?>
                                                <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#e<?php echo $book;?>">Return</button>
                                           <?php }?>
                                            
                                                </td>
                                            </td>
                                            <!-- end delete modal -->
                                        </tr>
<div class="modal fade" id="e<?php echo $book;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="return.php">
                    <div class="row">

                 
                    <input type="hidden" name="id" value="<?php echo $book_row['book_id']?>">
   <div class="row mb-3">
    <div class="col-md-12 position-relative">
          <div class="form-group">
              <label for="validationTooltip01">Are you sure want to return <?php echo $book?>?</label>
                
            </div>
          </div>
   </div>

                    <br>
                    <div class="control-group ">
                        <div class="controls">
                            <hr>
                            <button type="submit" name="save" class="btn btn-info"><i
                                    class="icon-save icon-large"></i>&nbsp;Save</button>
                        </div>
                    </div>
                    </form>
            </div>

           
      </div>
    </div>
  </div>
</div>
</div>
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


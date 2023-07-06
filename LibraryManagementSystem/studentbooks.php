<?php
include_once("connection.php");
$connection = connection();
include('studentsession.php');
$query = mysqli_query($connection, "select * from students where Student_id='$session_id'") or die($connection->error);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Textbooks</title>


</head>
</style>


<body>

    <?php include('studentnavbar.php'); ?>
    
    <main id="content">
        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                        <h1 class="">Textbooks</h1>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>
                                <th>Name</th>            
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
               $connection = connection();
               error_reporting(0);
               $queryyy = mysqli_query($connection, "select * from book") or die($connection->error);
               while ($row = mysqli_fetch_array($queryyy)) {
                   $book_id = $row['book_id'];
                   $book_name = $row['name'];
               
               ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>                  
                                        <td>
                                            <a rel="tooltip" title="ListedBook" id="e<?php echo $book_name; ?>" href="studentlistedbook.php<?php echo '?id=' . $book_name; ?>" class="btn btn-success"><i class="bx bxs-edit"></i>&nbsp;View</a>
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
         
    </main>

</body>

</html>
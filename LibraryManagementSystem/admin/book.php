<?php
include_once("../connection.php");
$connection = connection();
include('session.php');
$query = mysqli_query($connection, "select * from admin where id='$session_id'") or die($connection->error);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>


</head>
</style>


<body>

    <?php include('navbar.php'); ?>
    
    <main id="content">
        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                        <h1 class="">Barrowed Textbooks</h1>
      
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
                                            <a rel="tooltip" title="barrowbooks.php" id="e<?php echo $book_name; ?>" href="barrowbooks.php<?php echo '?id=' . $book_name; ?>" class="btn btn-success"><i class="bx bxs-edit"></i>&nbsp;View</a>
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

<?php 
if (isset($_POST['save'])) {

    $bookname = $_POST['bookname'];
    $qty= $_POST['qty'];
   
    $query1 = mysqli_query($connection, "SELECT * from book where name = '$bookname'");
    if (mysqli_num_rows($query1) > 0) {
        for ($i = 0; $i < $qty ; $i++)
        {
        mysqli_query($connection, "INSERT into books (name,date) values ('$bookname',NOW())") or die($connection->error);
        echo ('<script>location.href = "books.php"</script>');
        }
    } else {
        mysqli_query($connection, "INSERT into book (name) values ('$bookname')") or die($connection->error);
        for ($i = 0; $i < $qty ; $i++)
        {
        mysqli_query($connection, "INSERT into books (name,date) values ('$bookname',NOW())") or die($connection->error);
        echo ('<script>location.href = "books.php"</script>');
        }
        
}
}
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">

                    <div class="col-6">
                            <div class="control-group">
                                <label class="control-label " for="inputPassword">Book Name</label>
                                <div class="controls">
                                    <input type="text" name="bookname" id="inputPassword" class="form-control uc-text"
                                        placeholder="Book Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="control-group">
                                <label class="form-label" for="inputEmail">Quantity</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" name="qty" class="form-control"
                                        placeholder="Quantity" required>
                                </div>
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
<script>

  var forceInputUppercase = function(e) {
    let el = e.target;
    let start = el.selectionStart;
    let end = el.selectionEnd;
    el.value = el.value.toUpperCase();
    el.setSelectionRange(start, end);
  };

  document.querySelectorAll(".uc-text").forEach(function(current) {
    current.addEventListener("keyup", forceInputUppercase);
  });

</script>
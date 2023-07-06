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

<?php

if (isset($_POST['save'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $section = $_POST['Section'];


    $query1 = mysqli_query($connection, "SELECT * from students where username = '$username'");
    if (mysqli_num_rows($query1) > 0) {
        echo ('<script>alert("Data Existed");</script>');
    } else {
        mysqli_query($connection, "INSERT into students (username,password,name,section)
        values ('$username','$password','$name','$section') ") or die($connection->error);
        echo ('<script>location.href = "students.php"</script>');
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
                                <label class="control-label" for="inputPassword">Name</label>
                                <div class="controls">
                                    <input type="text" name="name" id="inputPassword" class="form-control"
                                        placeholder="Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="control-group">
                                <label class="form-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" name="username" class="form-control"
                                        placeholder="Username" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="control-group">
                                <label class="form-label" for="inputEmail">Password</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" name="password" class="form-control"
                                        placeholder="Password" required>
                                </div>
                            </div>
                        </div>


                     

                        <div class="col-6">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Section</label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" name="Section" class="form-control"
                                        placeholder="Section" required>
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
</div>






    <main id="content">
        <div class="container">   

            <div class="row p-0">
                <div class="col-md-12 pt-1">
                    <div class="pt-3" id="card">
                        <h1 class="">List of Students</h1>
                     <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Students
    </button>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Section</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
               $connection = connection();
               error_reporting(0);
               $query = mysqli_query($connection, "select * from students") or die($connection->error);
               while ($row = mysqli_fetch_array($query)) {
                   $student_id = $row['Student_id'];
               
               ?>


                                    <tr>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['section']; ?></td>
                                        <td>
                                            <a rel="tooltip" title="Edit Teacher" id="e<?php echo $teacher_id; ?>" href="editTeacher.php<?php echo '?id=' . $teacher_id; ?>" class="btn btn-success"><i class="bx bxs-edit"></i>&nbsp;</a>
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
 </div>   
</main>

</body>

</html>
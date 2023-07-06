<?php
                include('connection.php');
                require_once('studentsession.php');
               $connection = connection();
               error_reporting(0);
          
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    #card {
    color: #25396f;
    font-family: 'poppins';
    font-weight: 100px;
}

#cInfo {
    margin: 5px;
    padding: 5px;
    border: 2px;
    border-radius: 10px;
    background-color:azure;
}

.stats-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 0.5rem;
    background-color: #57CAEB;
    float: right;
    display: flex;
    align-items: center;
    justify-content: center;
}

.iconly-boldUser {
    color: white;

}

.iconly-boldProfile {
    color: white;

}
.card {
    padding: 10%;
 width: 100%    ;
 height: 254px;
 background: rgb(236, 236, 236);
 box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}
a:link { text-decoration: none; color: black;}
</style>
<body>
<?php include('studentnavbar.php'); ?>

<div class="container">  
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12 mt-5">
        <div class="card">

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label " for="inputPassword">Serial Number</label>
                                <div class="controls">
                                    <input type="number" name="bookid" id="inputPassword" class="form-control uc-text"
                                        placeholder="Serial Number" required>
                                </div>
                            </div>


                    <br>
                    <div class="control-group ">
                        <div class="controls">
                            <button type="submit" name="save" class="btn btn-info"><i
                                    class="icon-save icon-large"></i>&nbsp;submit</button><br>
                                    <button type="submit" name="save" class="btn btn-info mt-1"><i
                                    class="icon-save icon-large"> <a href="qrscan.php"></i>&nbsp;Scan Qr</a></button>
</button>
                        </div>
                        
                    </div>
                    </form>
        </div>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>

<?php 




if (isset($_POST['save'])) {

    $bookid = $_POST['bookid'];
   
    $query1 = mysqli_query($connection, "SELECT * from barrowed where book_id = '$bookid'");
    if (mysqli_num_rows($query1) > 0) {
        echo "<script>alert('book already Taken');</script>";
    } else {
        $query13 = mysqli_query($connection, "select * from books where book_id = '$bookid'");
        if (mysqli_num_rows($query13) < 1) {
            echo "<script>alert('Serial Number is not correct');</script>";
        } else {
        $queryyy = mysqli_query($connection, "select * from books where book_id = '$bookid'") or die($connection->error);
        while ($row = mysqli_fetch_array($queryyy)) {
         $book_name = $row['name'];

        }
        echo "<script>alert('You barrowed $book_name');</script>";
        mysqli_query($connection, "INSERT into barrowed (Student_id, book_id,time_in,status) values ('$session_id','$bookid',NOW(),'1')")or die($connection->error);
        echo ('<script>location.href = "studenthome.php"</script>');
        
    }
}
}


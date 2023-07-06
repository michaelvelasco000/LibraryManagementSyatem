<?php
require('session.php');

$get_id = $_GET['id'];
$connection = connection();

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Textbooks</title>
<!DOCTYPE html>
<html>
<style type="text/css" media="print">
    @media print {

        .noprint,
        .noprint * {
            display: none !important;
        }
    }

    body {
        font-style: Sans-serif;
    }
</style>
<style type="text/css">
    .container {
        /*border: 1px solid black;*/
        border: 40px solid transparent;
        /* border-image: url(logo.png) 80 stretch;*/
        padding: 0px;
    }

    p {
        text-align: justify;
    }
</style>

<body onload="print()">
    <!--  <body>  -->

    <div class="container">

                <div class="col-sm-12">
                      
                    
                    <div class="row">
                    <a href="listedbook.php<?php echo '?id=' . $get_id;?>" class="btn btn-danger noprint" style="width:10%;"> Back </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered text-center" id="datatable">
                                <thead>

                                    <th>Serial Number</th>
                                    <th>Book Name</th>
                                    <th>Qr code</th>                        
                                 
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
                                        <td class="text-center">
                                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $row['book_id'] ?>&choe=UTF-8" title="2" style = "height:200px; width:200px;"/>
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
        <br>

        </div>

</body>

</html>
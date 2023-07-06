<?php
                include('../connection.php');
                require_once('session.php');
               $connection = connection();
               error_reporting(0)
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
    font-family: 'Franklin Gothic Medium';
    font-weight: 100px;
}

#cInfo {
    height: 100%;
    padding:5px;
    border: solid 2px black;
    border-radius: 10px;
    background-color:azure;
}

.stats-icon {
    border: solid 2px black;
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
.media-body{
    margin-left: 10%;
}
</style>
<body>
<?php include('navbar.php'); ?>

<div class="container">

    <div class="row p-0">
        <div class="col-md-12 pt-3 mb-5">
        <h1 class="">DASHBOARD</h1>
        </div>

        <!--COUNT THE ROWS-->

        <div class="col-md-3 col-sm-6 ">
            <div class=" " id="cInfo">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="stats-icon">
                            <i class='bx bxs-user' style="color: white;"></i><br>
                            </div>
                            <div class="media-body">

                                <?php
                                $query = 'SELECT * FROM admin';
                                $query_run = mysqli_query(
                                    $connection,
                                    $query
                                );

                                if (
                                    $user_total = mysqli_num_rows(
                                        $query_run
                                    )
                                ) {
                                    echo '<h4 class="mb-0">' .
                                        $user_total .
                                        '</h4>';
                                } else {
                                    echo 'no data';
                                }
                                ?>

                                <span>Admin</span>

                            </div>
                            <div class="align-self-center">
                                <i class="icon-user success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3 col-sm-6">
            <div class="" id="cInfo">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="stats-icon blue">
                            <i class='bx bxs-user' style="color: white;"></i><br>
                            </div>

                            <div class="media-body">

                                <?php
                                $query =
                                    'SELECT * FROM students';
                                $query_run = mysqli_query(
                                    $connection,
                                    $query
                                );

                                if (
                                    $user_total = mysqli_num_rows(
                                        $query_run
                                    )
                                ) {
                                    echo '<h4 class="mb-0">' .
                                        $user_total .
                                        '</h4>';
                                } else {
                                    echo 'no data';
                                }
                                ?>

                                <span>Students</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


      

        <!--COUNT THE ROWS-->
        <div class="col-md-3 col-sm-6">
            <div class="" id="cInfo">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="stats-icon blue">
                            <i class='bx bxs-book-content' style="color: white;" ></i><br>
                            </div>

                            <div class="media-body">

                                <?php
                                $query = 'SELECT * FROM books ';
                                $query_run = mysqli_query(
                                    $connection,
                                    $query
                                );

                                if (
                                    $user_total = mysqli_num_rows(
                                        $query_run
                                    )
                                ) {
                                    echo '<h4 class="mb-0">' .
                                        $user_total .
                                        '</h4>';
                                } else {
                                    echo 'no data';
                                }
                                ?>

                                <span>Total Textbooks</span>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         </div>

                <!--COUNT THE ROWS-->
                <div class="col-md-3 col-sm-6">
            <div class="" id="cInfo">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="stats-icon blue">
                            <i class='bx bxs-book-content' style="color: white;" ></i><br>
                            </div>

                            <div class="media-body">

                                <?php
                                $query = 'SELECT * FROM barrowed ';
                                $query_run = mysqli_query(
                                    $connection,
                                    $query
                                );

                                if (
                                    $user_total = mysqli_num_rows(
                                        $query_run
                                    )
                                ) {
                                    echo '<h4 class="mb-0">' .
                                        $user_total .
                                        '</h4>';
                                } else {
                                    echo 'no data';
                                }
                                ?>
                                <span>Barrowed Textbooks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!--END COUNT ROWS-->


 
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
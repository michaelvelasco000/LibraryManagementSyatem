<?php
session_start(); //we need session for the log in thingy XD 
include("connection.php");
$connection = connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="css/index.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>

</style>
<body style="background-image: url(bg.jpg); background-repeat:no-repeat;background-size: 100% 100%;">
<div class="container-fluid" style="height: 95vh;">
<div class="row justify-content-end">
    <div class="col-md-2 col-sm-4 mt-2">
    <button class="button" style="border-radius: 10px;"><a href="admin/index.php" style="text-decoration: none; color:aliceblue">Administrator</a></button>
    </div>
</div>

    <div class="h1 text-center">Library Management System</div>
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-8 mt-5">
        <div data-aos="fade-up"
     data-aos-duration="3000">
        <form class="form card" action="" method="post">
                <div class="card_header">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor" d="M4 15h2v5h12V4H6v5H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6zm6-4V8l5 4-5 4v-3H2v-2h8z"></path>
                    </svg>
                    <h1 class="form_heading">Sign in for Students</h1>
                </div>
                <div class="field">
                    <label for="username">Username</label>
                    <input class="input" name="username" type="text" placeholder="Username" id="username">
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input class="input" name="password" type="password" placeholder="Password" id="password">
                </div>
                <div class="field">
                    <button class="button" type="submit" name="login" style="border-radius: 10px;">Login</button>
                </div>
                </form>
                </div>
                <?php

                        if (isset($_POST['login'])) {


                            $username = mysqli_real_escape_string($connection, $_POST['username']);
                            $password = mysqli_real_escape_string($connection, $_POST['password']);

                            $query = mysqli_query($connection, "select * from students where username='$username' and password='$password'") or die($connection->error);
                            $count = mysqli_num_rows($query);
                            $row = mysqli_fetch_array($query);


                            if ($count > 0) {

                                $_SESSION['id'] = $row['Student_id'];
                                echo ('<script>location.href = "studenthome.php"</script>');

                                echo 'true';;

                                session_write_close();
                                exit();
                            } else {
                                session_write_close();
                                header("Refresh:4; url=index.php");
                        ?>

                                
                                <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>

                        <?php

                            }
                        }
                        ?>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<?php
function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "library";

    $connection = new mysqli($host,$user,$pass,$db);

    if($connection->connect_error){
        $connection->connect_error;
    }else{
        return $connection;
    }


}
$host = "localhost";
$user = "root";
$pass = "";
$db = "library";

$connection = new mysqli($host,$user,$pass,$db);

if($connection->connect_error){
    $connection->connect_error;
}else{
    return $connection;
}
   
?>
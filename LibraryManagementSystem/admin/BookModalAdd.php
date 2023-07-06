<?php 
include('../connection.php');
$connection = connection();
$query = mysqli_query($connection, "select * from books limit 1") or die($connection->error);
while ($row = mysqli_fetch_assoc($query)) {
    $text= $row['name'];
    echo $text;
    echo "<br><br><br><br><br>";
   
} 
$sql = "select * from books";
$result = $connection->query($sql);

if ($result->num_rows > 1) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo $row['name'];
  }
} else {
  echo "0 results";
}


$rows = mysqli_query($connection,"SELECT * FROM books WHERE name IN ({$decodedPostIds}) AND state='1' order by time LIMIT 10");

foreach($rows as $row){
    if(count($arr[$row['name']]) < 10){
      $text = array_push($arr[$row['name']],$row);
      
    }
}
echo $text;
?>  

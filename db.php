<?php
$servername = "localhost";
$dbname = 'blog4';
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


     function test($data){
         echo "<pre>";
         print_r($data);
         echo "</pre>";
         exit;
    }
?>

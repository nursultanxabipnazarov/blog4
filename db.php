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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<ol><li><h2>Why do we use it?</h2></li><li><h2>Why do we use it?</h2></li><li><h2>Why do we use it?</h2></li><li><h2>Why do we use it?</h2></li><li><h2>Why do we use it?</h2><figure class="media"><oembed url="https://youtu.be/NubguMJZV48?si=2CVixrhLRSlwWxjl"></oembed></figure></li></ol>
</body>
</html>
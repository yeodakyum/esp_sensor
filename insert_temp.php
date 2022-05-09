<?php

if(isset($_GET["temperature"])) {
   $temperature = $_GET["temperature"]; 

   $servername = "localhost";
   $username = "admin";
   $password = "password";
   $database_name = "db_esp32";

 
   $connection = new mysqli($servername, $username, $password, $database_name);

   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }

   $sql = "INSERT INTO tbl_temp (temp_value) VALUES ($temperature)";

   if ($connection->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $connection->error;
   }

   $connection->close();
} else {
   echo "temperature is not set in the HTTP request";
}
?>



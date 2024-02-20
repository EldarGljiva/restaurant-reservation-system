<?php

require_once("rest/dao/WorkersDao.class.php");
$workersDao = new WorkersDao();
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$result = $workersDao->add($firstName, $lastName);
print_r($result);




/*
$servername = "localhost";
$username = "root";
$password = "06082004";
$schema = "restaurant";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

    $firstName = $_REQUEST['firstName'];
    $lasttName = $_REQUEST['lastName'];

  $stmt = $conn->prepare("INSERT INTO workers (firstName, lastName) VALUES ('$firstName','$lastName')");
  $result = $stmt->execute();
  print_r($result);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

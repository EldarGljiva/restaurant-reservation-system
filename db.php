<?php

require_once("rest/dao/WorkersDao.class.php");
$workersDao = new WorkersDao();
$results = $workersDaos->getAll();
print_r($results);

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

  $stmt = $conn->prepare("SELECT * FROM workers");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO:FETCH_ASSOC);
  print_r($result);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

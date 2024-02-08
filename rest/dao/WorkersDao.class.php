<?php

class WorkersDao
{
  private $conn;

  // Class constructor used to establish connection to db
  public function __construct()
  {
    try {
      $servername = "localhost";
      $username = "root";
      $password = "06082004";
      $schema = "restaurant";

      $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";

      $stmt = $this->conn->prepare("SELECT * FROM workers");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      print_r($result);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  // Method used to get all workers from db
  public function getAll()
  {
    $stmt = $this->conn->prepare("SELECT * FROM workers");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Method used to add worker to db
  public function add($firstName, $lastName)
  {
    $stmt = $this->conn->prepare("INSERT INTO workers (firstName, lastName) VALUES ('$firstName','$lastName')");
    $result = $stmt->execute();
  }
}

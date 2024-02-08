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
      echo "Connected successfully \n";

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
    $stmt = $this->conn->prepare("INSERT INTO workers (firstName, lastName) VALUES (?,?)");
    $result = $stmt->execute([$firstName, $lastName]);
  }

  // Method to update worker from db
  public function update($id, $firstName, $lastName)
  {
    $stmt = $this->conn->prepare("UPDATE workers  SET firstName=?, lastName=? WHERE id = ?");
    $result = $stmt->execute([$firstName, $lastName, $id]);
  }

  // Method used to delete worker from db
  public function delete($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM workers WHERE id =?");
    $stmt->execute([$id]);
  }
}

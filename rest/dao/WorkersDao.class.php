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
  public function add($worker)
  {
    $stmt = $this->conn->prepare("INSERT INTO workers (firstName, lastName) VALUES (?,?)");
    $stmt->execute([$worker['firstName'], $worker['lastName']]);
    $worker['id'] = $this->conn->lastInsertId();
    return $worker;
  }

  // Method to update worker from db
  public function update($id, $worker)
  {
    $worker['id'] = $id;
    $stmt = $this->conn->prepare("UPDATE workers SET firstName=?, lastName=? WHERE id = ?");
    $stmt->execute([$worker['firstName'], $worker['lastName'], $id]);
    return $worker;
  }

  // Method used to delete worker from db
  public function delete($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM workers WHERE id =?");
    $stmt->execute([$id]);
  }

  // Method used to get worker by id
  public function getById($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM workers WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
  }
}

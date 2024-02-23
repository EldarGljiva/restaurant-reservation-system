<?php

require __DIR__ . "/../Config.class.php";

class BaseDao
{
    private $conn;
    private $table_name;

    // Class constructor used to establish connection to db
    public function __construct($table_name)
    {
        try {
            $this->table_name = $table_name;
            $servername = Config::DB_HOST();
            $username = Config::DB_USERNAME();
            $password = Config::DB_PASSWORD();
            $schema = Config::DB_SCHEME();

            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully \n";

            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            print_r($result);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Method used to get all entities from db
    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method used to get entity by id
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Method used to delete entity from db
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table_name .  " WHERE id =?");
        $stmt->execute([$id]);
    }

    // Method used to add entity to db
    public function add($entity)
    {

        $query = "INSERT INTO " . $this->table_name . " (";
        foreach ($entity as $column => $value) {
            $query .= $column . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES(";
        foreach ($entity as $column => $value) {
            $query .= ":" . $column . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= ")";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($entity);
        $entity['id'] = $this->conn->lastInsertId();
        return $entity;
    }

    // Method to update entity from db
    public function update($id, $entity)
    {
        $query = "UPDATE " . $this->table_name . " SET ";
        foreach ($entity as $column => $value) {
            $query .= $column . "=:" . $column . ", ";
        }
        $query = substr($query, 0, -2);
        $query .= " WHERE id = :id";
        $entity['id'] = $id;
        $stmt = $this->conn->prepare($query); //UPDATE workers SET firstName=?, lastName=? WHERE id = ?
        $stmt->execute($entity);
        return $entity;
    }
}
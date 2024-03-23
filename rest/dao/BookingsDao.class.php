<?php

require_once __DIR__ . "/BaseDao.class.php";

class BookingsDao extends BaseDao
{
    // Class constructor used to establish connection to db
    public function __construct()
    {
        parent::__construct("booking");
    }


    // Override getById method to display all bookings with customer id 
    public function getAllBookingsById($email)
    {
        $id = $this->getCustomerIdByEmail($email);
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM booking WHERE customerId = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Override the add method for specific behavior related to bookings
    public function add($entity)
    {
        // For example, retrieving customerId and tableId
        $customerId = $this->getCustomerIdByEmail($entity['email']);
        $tableId = $this->getTableIdByNumber($entity['table']);

        // Modify the entity before passing it to parent add method
        $booking['customerId'] = $customerId;
        $booking['tableId'] = $tableId;
        $booking['reservationDate'] = $entity['reservationDate'];

        // Call parent add method to insert into database
        return parent::add($booking);
    }

    // Additional methods specific to BookingsDao
    private function getCustomerIdByEmail($email)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT id FROM customer WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn(); // fetchColumn() gets us a single value
    }

    private function getTableIdByNumber($tableNumber)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT id FROM restauranttable WHERE tableNumber = ?");
        $stmt->execute([$tableNumber]);
        return $stmt->fetchColumn();
    }
}

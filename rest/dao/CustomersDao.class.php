<?php

require_once __DIR__ . "/BaseDao.class.php";

class CustomersDao extends BaseDao
{
  // Class constructor used to establish connection to db
  public function __construct()
  {
    parent::__construct("customers");
  }


  // Override add method to hash password
  public function add($customer)
  {
    // Hash the password using password_hash()
    $hashedPassword = password_hash($customer['password'], PASSWORD_DEFAULT);

    $customer['password'] = $hashedPassword;
    $customer['role'] = 'customer';

    // Call the parent add method
    return parent::add($customer);
  }
}

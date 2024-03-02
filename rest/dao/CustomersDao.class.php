<?php

require_once __DIR__ . "/BaseDao.class.php";

class CustomersDao extends BaseDao
{
  // Class constructor used to establish connection to db
  public function __construct()
  {
    parent::__construct("customer");
  }


  // Override add method to hash password
  public function add($customer)
  {
    $customer['password'] = md5($customer['password']);
    return parent::add($customer);
  }





  // Function to get Customer by email
  // SHOULD USE THIS BUT DOESN'T WOKR YET
  /*public function getByEmail($email)
{
    return $this->query("SELECT * FROM customer WHERE email = :email", ["email" => $email]);
  }*/
}

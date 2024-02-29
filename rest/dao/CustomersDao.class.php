<?php

require_once __DIR__ . "/BaseDao.class.php";

class CustomersDao extends BaseDao
{
  // Class constructor used to establish connection to db
  public function __construct()
  {
    parent::__construct("customer");
  }

  /*
  public function getAll()
  {
    return parent::getAll();
  }
  */
}

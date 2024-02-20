<?php

require "BaseDao.class.php";

class WorkersDao extends BaseDao
{
  // Class constructor used to establish connection to db
  public function __construct()
  {
    parent::__construct("workers");
  }

  /*
  public function getAll()
  {
    return parent::getAll();
  }
  */
}

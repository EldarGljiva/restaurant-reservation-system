<?php

require "BaseDao.class.php";

class BookingsDao extends BaseDao
{
    // Class constructor used to establish connection to db
    public function __construct()
    {
        parent::__construct("booking");
    }
}

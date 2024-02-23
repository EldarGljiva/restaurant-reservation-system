<?php

require "BaseDao.class.php";

class RestaurantTablesDao extends BaseDao
{
    // Class constructor used to establish connection to db
    public function __construct()
    {
        parent::__construct("restauranttable");
    }
}

<?php

require_once "BaseService.php";
require __DIR__ . '/../dao/BookingsDao.class.php';

class BookingService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new BookingsDao);
    }
}

<?php

require "BaseService.php";
require __DIR__ . '/../dao/WorkersDao.class.php';

class WorkerService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new WorkersDao);
    }

    /*
    public function add($entity)
    {
        return parent::add($entity);
    }
    */
}

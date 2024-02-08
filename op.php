<?php

require_once("rest/dao/WorkersDao.class.php");
$workers_dao = new WorkersDao();

$type = $_REQUEST['type'];

switch ($type) {

    case "add":

        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $result = $workersDao->add($firstName, $lastName);
        print_r($result);
        break;

    case "delete":

        print_r("delete");
        break;

    case "update":

        print_r("update");
        break;

    case "get":

    default:

        $results = $workers_dao->getAll();
        print_r($results);
        break;
}

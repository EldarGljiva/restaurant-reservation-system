<?php

require_once("./rest/dao/WorkersDao.class.php");
$workersDao = new WorkersDao();

$type = $_REQUEST['type'];

switch ($type) {

    case "add":

        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $result = $workersDao->add($firstName, $lastName);
        print_r($result);
        break;

    case "delete":

        $id = $_REQUEST['id'];
        $result = $workersDao->delete($id);
        break;

    case "update":

        $id = $_REQUEST['id'];
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $result = $workersDao->update($id, $firstName, $lastName);
        print_r($result);
        break;

    case "get":

    default:

        $results = $workersDao->getAll();
        print_r($results);
        break;
}

<?php

require "../vendor/autoload.php";
require "./dao/WorkersDao.class.php";

Flight::register("workerDao", "WorkersDao");


Flight::route("/", function () {
    echo "Hello from / route";
});

// Route used to get all workers from db
Flight::route("GET /workers", function () {
    //$workerDao = new WorkersDao();
    //$result = $workerDao->getAll();
    //print_r($result);
    flight::json(flight::workerDao()->getAll());
});

// Route used to get all worker by id from db
Flight::route("GET /workers/@id", function ($id) {
    //$workerDao = new WorkersDao();
    //$result = $workerDao->getById($id);
    //print_r($result);
    flight::json(flight::workerDao()->getById($id));
});

// Route used to delete worker by id from db
Flight::route("DELETE /workers/@id", function ($id) {
    //$workerDao = new WorkersDao();
    //$workerDao->delete($id);
    //print_r($result);
    flight::json(["message" => "Worker Deleted Succesfully", "data" => flight::workerDao()->delete($id)]);
});

// Route used to add worker to db
Flight::route("POST /workers", function () {
    //$workerDao = new WorkersDao();
    //$request = Flight::request()->data->getData();
    //$response = $workerDao->add($request);
    //print_r($result);
    flight::json(["message" => "Worker added Succesfully", "data" => flight::workerDao()->add(Flight::request()->data->getData())]);
});

// Route used to edit worker from db
Flight::route("PUT /workers/@id", function ($id) {
    //$workerDao = new WorkersDao();
    //$request = Flight::request()->data->getData(); // Used to capture the incoming request sent by the client
    //$response = $workerDao->update($id, $request);
    //print_r($result);
    flight::json(["message" => "Worker changed Successfully", "data" => flight::workerDao()->update($id, Flight::request()->data->getData())]);
});

Flight::start();

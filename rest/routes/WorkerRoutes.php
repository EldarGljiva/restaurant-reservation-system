<?php

// Route used to get all workers from db
Flight::route("GET /workers", function () {
    //$workerService = new WorkersDao();
    //$result = $workerService->getAll();
    //print_r($result);
    flight::json(flight::workerService()->getAll());
});

// Route used to get all worker by id from db
Flight::route("GET /workers/@id", function ($id) {
    //$workerService = new WorkersDao();
    //$result = $workerService->getById($id);
    //print_r($result);
    flight::json(flight::workerService()->getById($id));
});

// Route used to delete worker by id from db
Flight::route("DELETE /workers/@id", function ($id) {
    //$workerService = new WorkersDao();
    //$workerService->delete($id);
    //print_r($result);
    flight::json(["message" => "Worker Deleted Succesfully", "data" => flight::workerService()->delete($id)]);
});

// Route used to add worker to db
Flight::route("POST /workers", function () {
    //$workerService = new WorkersDao();
    //$request = Flight::request()->data->getData();
    //$response = $workerService->add($request);
    //print_r($result);
    flight::json(["message" => "Worker added Succesfully", "data" => flight::workerService()->add(Flight::request()->data->getData())]);
});

// Route used to edit worker from db
Flight::route("PUT /workers/@id", function ($id) {
    //$workerService = new WorkersDao();
    //$request = Flight::request()->data->getData(); // Used to capture the incoming request sent by the client
    //$response = $workerService->update($id, $request);
    //print_r($result);
    flight::json(["message" => "Worker changed Successfully", "data" => flight::workerService()->update($id, Flight::request()->data->getData())]);
});

Flight::start();

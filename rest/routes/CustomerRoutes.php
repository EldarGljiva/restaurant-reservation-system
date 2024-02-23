<?php

// Route used to get all customers from db
Flight::route("GET /customers", function () {
    Flight::json(Flight::customerService()->getAll());
});

// Route used to get customer by id from db
Flight::route("GET /customers/@id", function ($id) {
    Flight::json(Flight::customerService()->getById($id));
});

// Route used to delete customer by id from db
Flight::route("DELETE /customers/@id", function ($id) {
    Flight::json(["message" => "Customer Deleted Succesfully", "data" => Flight::customerService()->delete($id)]);
});

// Route used to add customer to db
Flight::route("POST /customers", function () {
    Flight::json(["message" => "Customer added Succesfully", "data" => Flight::customerService()->add(Flight::request()->data->getData())]);
});

// Route used to edit customer from db
Flight::route("PUT /customers/@id", function ($id) {
    Flight::json(["message" => "Customer changed Successfully", "data" => Flight::customerService()->update($id, Flight::request()->data->getData())]);
});

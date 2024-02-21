<?php

// Route used to get all customers from db
Flight::route("GET /customers", function () {
    flight::json(flight::customerService()->getAll());
});

// Route used to get customer by id from db
Flight::route("GET /customers/@id", function ($id) {
    flight::json(flight::customerService()->getById($id));
});

// Route used to delete customer by id from db
Flight::route("DELETE /customers/@id", function ($id) {
    flight::json(["message" => "Customer Deleted Succesfully", "data" => flight::customerService()->delete($id)]);
});

// Route used to add customer to db
Flight::route("POST /customers", function () {
    flight::json(["message" => "Customer added Succesfully", "data" => flight::customerService()->add(Flight::request()->data->getData())]);
});

// Route used to edit customer from db
Flight::route("PUT /customers/@id", function ($id) {
    flight::json(["message" => "Customer changed Successfully", "data" => flight::customerService()->update($id, Flight::request()->data->getData())]);
});

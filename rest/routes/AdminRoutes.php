<?php

// Route
Flight::route("POST /admin", function () {
    Flight::json(["message" => "Item added to Menu Succesfully", "data" => Flight::adminService()->add(Flight::request()->data->getData())]);
});

// Route used to get menu items by id from db
Flight::route("GET /admin/@id", function ($id) {
    Flight::json(Flight::adminService()->getById($id));
});

// Route used to delete admin by id from db
Flight::route("DELETE /admin/@id", function ($id) {
    Flight::json(["message" => "admin Deleted Succesfully", "data" => Flight::adminService()->delete($id)]);
});

// Route used to add admin to db
Flight::route("POST /admin", function () {
    Flight::json(["message" => "admin added Succesfully", "data" => Flight::adminService()->add(Flight::request()->data->getData())]);
});

// Route used to edit admin from db
Flight::route("PUT /admin/@id", function ($id) {
    Flight::json(["message" => "admin changed Successfully", "data" => Flight::adminService()->update($id, Flight::request()->data->getData())]);
});

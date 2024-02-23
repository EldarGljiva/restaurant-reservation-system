<?php

// Route
Flight::route("POST /menuitems", function () {
    Flight::json(["message" => "Item added to Menu Succesfully", "data" => Flight::menuitemsService()->add(Flight::request()->data->getData())]);
});

// Route used to get menu items by id from db
Flight::route("GET /menuitems/@id", function ($id) {
    Flight::json(Flight::menuitemsService()->getById($id));
});

// Route used to delete menuitems by id from db
Flight::route("DELETE /menuitemss/@id", function ($id) {
    Flight::json(["message" => "menuitems Deleted Succesfully", "data" => Flight::menuitemsService()->delete($id)]);
});

// Route used to add menuitems to db
Flight::route("POST /menuitemss", function () {
    Flight::json(["message" => "menuitems added Succesfully", "data" => Flight::menuitemsService()->add(Flight::request()->data->getData())]);
});

// Route used to edit menuitems from db
Flight::route("PUT /menuitemss/@id", function ($id) {
    Flight::json(["message" => "menuitems changed Successfully", "data" => Flight::menuitemsService()->update($id, Flight::request()->data->getData())]);
});

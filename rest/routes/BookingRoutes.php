<?php

// Route used to get all bookings from db
Flight::route("GET /bookings", function () {
    Flight::json(Flight::bookingService()->getAll());
});

// Route used to get booking by id from db
Flight::route("GET /bookings/@id", function ($id) {
    Flight::json(Flight::bookingService()->getById($id));
});

// Route used to get booking by customer id from db
Flight::route("GET /bookings/customers/@email", function ($email) {
    Flight::json(Flight::bookingService()->getAllBookingsById($email));
});

// Route used to delete booking by id from db
Flight::route("DELETE /bookings/@id", function ($id) {
    Flight::json(["message" => "booking Deleted Succesfully", "data" => Flight::bookingService()->delete($id)]);
});

// Route used to add booking to db
Flight::route("POST /bookings", function () {
    Flight::json(["message" => "booking added Succesfully", "data" => Flight::bookingService()->add(Flight::request()->data->getData())]);
});

// Route used to edit booking from db
Flight::route("PUT /bookings/@id", function ($id) {
    Flight::json(["message" => "booking changed Successfully", "data" => Flight::bookingService()->update($id, Flight::request()->data->getData())]);
});

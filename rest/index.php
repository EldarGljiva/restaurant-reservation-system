<?php

// Include flightPHP
require "../vendor/autoload.php";

require "./services/CustomerService.php";

Flight::register("customerService", "CustomerService");

require_once "routes/CustomerRoutes.php";

// Default route
Flight::route("/", function () {
    echo "Hello from / route";
});


Flight::start();

<?php

// Include flightPHP
require "../vendor/autoload.php";

require "./services/WorkerService.php";

Flight::register("workerService", "WorkerService");

require_once "routes/WorkerRoutes.php";

// Default route
Flight::route("/", function () {
    echo "Hello from / route";
});


Flight::start();

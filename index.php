<?php
require "vendor/autoload.php"; // Include FlightPHP

Flight::route("/", function(){
    echo "Hello from / route";
});

Flight::route("GET /test", function(){
    echo "Hello from / test";
});

Flight::start();
?>
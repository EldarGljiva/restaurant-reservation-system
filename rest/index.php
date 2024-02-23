<?php

// Include flightPHP
require "../vendor/autoload.php";

require "services/CustomerService.php";
// Works when one of them is commented
//require "services/MenuItemsService.php";
// require "services/AdminService.php";
// require "services/RestaurantTableService.php";
// require "services/BookingService.php";
// require "services/PaymentService.php";

Flight::register("customerService", "CustomerService");
Flight::register("menuitemsService", "MenuItemsService");
Flight::register("adminService", "AdminService");
Flight::register("restauranttableService", "RestaurantTableService");
Flight::register("bookingService", "BookingService");
Flight::register("paymentService", "PaymentService");

require_once("routes/CustomerRoutes.php");
require_once("routes/MenuItemsRoutes.php");
require_once("routes/AdminRoutes.php");
require_once("routes/RestaurantTableRoutes.php");
require_once("routes/BookingRoutes.php");
require_once("routes/PaymentRoutes.php");

// Default route
Flight::route("/", function () {
    echo "Hello from / route";
});

Flight::start();

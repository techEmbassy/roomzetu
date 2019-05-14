<?php
require_once 'meekrodb.php';
DB::$user = 'root';
DB::$password = 'r5HvPVg9D4tRrd2C3FVzM86B4WwFQn9Q';
DB::$dbName = 'reservations_db';


//some constants
session_start();
$user_name=$_SESSION["user_name"];
$user_id = $_SESSION["user_id"];
<?php
require_once 'meekrodb.php';
DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'roomzetu';


//some constants
session_start();
$user_name=$_SESSION["user_name"];
$user_id = $_SESSION["user_id"];
<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/customers.php';

header("Content-Type: application/json");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$customersObj = new Customers($databaseConnection);
$customerData = $customersObj->getCustomers();

if (!empty($customerData)) {
    echo json_encode($customerData);
} else {
    echo json_encode(["message" => "No customer found"]);
}

<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/customers.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$customersObj = new Customers($databaseConnection);
$customerData = $customersObj->getCustomers();

if (!empty($customerData)) {
    echo json_encode($customerData);
} else {
    echo json_encode(["message" => "No customer found"]);
}

<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/customers.php';

header("Content-Type : application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$customerObj = new Customers($databaseConnection);

if (isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    $customer = $customerObj->getCustomerById($customer_id);

    if ($customer) {
        echo json_encode($customer);
    } else {
        echo json_encode(["message" => "Customer not found"]);
    }
} else {
    echo json_encode(["message" => "Customer ID is required"]);
}

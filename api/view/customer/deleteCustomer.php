<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/customers.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$customerObj = new Customers($databaseConnection);

if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];
    $deleteResult = $customerObj->deleteCustomer($customer_id);

    if ($deleteResult) {
        echo json_encode(["message" => "Customer deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete customer"]);
    }
} else {
    echo json_encode(["message" => "Customer id is required"]);
}

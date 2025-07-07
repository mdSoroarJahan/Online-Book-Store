<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/customers.php';

header("Customer-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$customerObj = new Customers($databaseConnection);

if (isset($_POST['customer_id'], $_POST['name'], $_POST['email'], $_POST['phone'])) {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $updateResult = $customerObj->updateCustomer($customer_id, $name, $email, $phone);

    if ($updateResult) {
        echo json_encode(["message" => "Customer updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update customer"]);
    }
} else {
    echo json_encode(["message" => "All fields are required"]);
}

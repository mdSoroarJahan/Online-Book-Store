<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/customers.php';

header("Content_Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$customerObj = new Customers($databaseConnection);

if (isset($_POST['name'], $_POST['email'], $_POST['phone'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $customerInsertResult = $customerObj->createCustomer($name, $email, $phone);

    if ($customerInsertResult) {
        echo json_encode(["message" => "Customer inserted successfully"]);
    } else {
        echo json_encode(["message" => "Internal server error"]);
    }
} else {
    echo json_encode(["message" => "All fields are required"]);
}

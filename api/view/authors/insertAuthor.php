<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/authors.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$authorsObj = new Authors($databaseConnection);

if (isset($_POST['name'], $_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $authorInsertResult = $authorsObj->createAuthor($name, $email);

    if ($authorInsertResult) {
        echo json_encode(["message" => "Author inserted successfully"]);
    } else {
        echo json_encode(["message" => "Internal server error"]);
    }
} else {
    echo json_encode(["message" => "All fields are required"]);
}

<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/authors.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$authorsObj = new Authors($databaseConnection);
$authorsData = $authorsObj->getAuthors();

if (!empty($authorsData)) {
    echo json_encode($authorsData);
} else {
    echo json_encode(["massage" => "No data found"]);
}

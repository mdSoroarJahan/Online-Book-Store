<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/authors.php';

header("Content-Type: application/json");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$authorObj = new Authors($databaseConnection);

if (isset($_POST['author_id'])) {
    $author_id = $_POST['author_id'];
    $deleteResult = $authorObj->deleteAuthor($author_id);

    if ($deleteResult) {
        echo json_encode(["massage" => "Author delete successfully"]);
    } else {
        echo json_encode(["massage" => "Failed to delete author"]);
    }
} else {
    echo json_encode(["massage" => "Author ID is required"]);
}

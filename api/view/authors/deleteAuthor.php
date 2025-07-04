<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/authors.php';

header("Content-Type: application/json");

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

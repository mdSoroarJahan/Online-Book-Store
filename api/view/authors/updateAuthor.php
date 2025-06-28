<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/authors.php';


header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$authorsObj = new Authors($databaseConnection);

if (isset($_POST['author_id'], $_POST['name'], $_POST['email'])) {
    $author_id = $_POST['author_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $updateResult = $authorsObj->updateAuthor($author_id, $name, $email);

    if ($updateResult) {
        echo json_encode(["massage" => "Author updated successfully"]);
    } else {
        echo json_encode(["massage" => "Failed to update author"]);
    }
} else {
    echo json_encode(["massage" => "All fields are required"]);
}

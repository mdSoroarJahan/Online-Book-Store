<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$bookObj = new Books($databaseConnection);
if (isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    $deleteResult = $bookObj->deleteBook($book_id);

    if ($deleteResult) {
        echo json_encode(["message" => "Book Deleted Successfully"]);
    } else {
        echo json_encode(["message" => "failed to delete book"]);
    }
} else {
    echo json_encode(["massage" => "Book Id is required"]);
}

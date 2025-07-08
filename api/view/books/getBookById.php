<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

header("Content-Type: application/json");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$bdObj = new Database();
$databaseConnection = $bdObj->getConnection();

$booksObj = new Books($databaseConnection);

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $book = $booksObj->getBookById($book_id);

    if ($book) {
        echo json_encode($book);
    } else {
        echo json_encode(["massage" => "Book not found"]);
    }
} else {
    echo json_encode(["massage" => "Book ID is required"]);
}

<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

header("Content-Type: application/json");

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

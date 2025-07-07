<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$booksObj = new Books($databaseConnection);
$booksData = $booksObj->getBooks();

if (!empty($booksData)) {
    echo json_encode($booksData);
} else {
    echo json_encode(["message" => "No books found"]);
}

<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

header("Content-Type: application/json");

$dbObj = new Database();
$databaseConnection = $dbObj->getConnection();

$bookObj = new Books($databaseConnection);

if (isset($_POST['title'], $_POST['price'], $_POST['stock_qty'], $_POST['author_id'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock_qty'];
    $author_id = $_POST['author_id'];

    $bookInsertResult = $bookObj->createBook($title, $price, $stock, $author_id);

    if ($bookInsertResult) {
        echo json_encode(["message" => "Book inserted successfully"]);
    } else {
        echo json_encode(["message" => "Internal server error"]);
    }
} else {
    echo json_encode(["message" => "All fields are required"]);
}

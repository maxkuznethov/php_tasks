<?php
include('db/order-repository.php');

// необходимые HTTP-заголовки
header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(OrderRepository::read());
        break;
    case 'POST':
        $newOrder = json_decode(file_get_contents('php://input'));
        OrderRepository::create($newOrder->name, $newOrder->total_price);
        break;
    case 'PUT':
        $newOrder = json_decode(file_get_contents('php://input'));
        echo OrderRepository::update($newOrder->id, $newOrder->name, $newOrder->total_price);
        break;
    case 'DELETE':
        echo OrderRepository::delete($_GET['id']);
        break;
    }
    ?>
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'fashion_market';

function get_db_connection() {
    global $host, $user, $password, $database;

    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_error) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $mysqli->connect_error]);
        exit;
    }
    $mysqli->set_charset('utf8mb4');
    return $mysqli;
}

function json_response($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

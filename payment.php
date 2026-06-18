<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed'], 405);
}
$input = json_decode(file_get_contents('php://input'), true);
$method = trim($input['method'] ?? '');
$items = $input['items'] ?? [];
if ($method === '') {
    json_response(['success' => false, 'message' => 'Payment method is required'], 400);
}
$items_json = json_encode(array_values($items));
$conn = get_db_connection();
$stmt = $conn->prepare('INSERT INTO payments (payment_method, order_items, submitted_at) VALUES (?, ?, NOW())');
$stmt->bind_param('ss', $method, $items_json);
$success = $stmt->execute();
$stmt->close();
$conn->close();
if ($success) {
    json_response(['success' => true, 'message' => 'Payment saved successfully']);
}
json_response(['success' => false, 'message' => 'Could not save payment'], 500);

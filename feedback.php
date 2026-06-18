<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed'], 405);
}
$input = json_decode(file_get_contents('php://input'), true);
$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$message = trim($input['message'] ?? '');
if ($name === '' || $email === '' || $message === '') {
    json_response(['success' => false, 'message' => 'All fields are required'], 400);
}
$conn = get_db_connection();
$stmt = $conn->prepare('INSERT INTO feedback (name, email, message, submitted_at) VALUES (?, ?, ?, NOW())');
$stmt->bind_param('sss', $name, $email, $message);
$success = $stmt->execute();
$stmt->close();
$conn->close();
if ($success) {
    json_response(['success' => true, 'message' => 'Feedback submitted successfully']);
}
json_response(['success' => false, 'message' => 'Could not save feedback'], 500);

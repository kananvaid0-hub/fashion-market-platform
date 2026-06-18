<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed'], 405);
}
$input = json_decode(file_get_contents('php://input'), true);
$name = trim($input['name'] ?? '');
$review = trim($input['review'] ?? '');
$rating = trim($input['rating'] ?? '');
if ($name === '' || $review === '' || $rating === '') {
    json_response(['success' => false, 'message' => 'All fields are required'], 400);
}
$conn = get_db_connection();
$stmt = $conn->prepare('INSERT INTO reviews (name, rating, review, submitted_at) VALUES (?, ?, ?, NOW())');
$stmt->bind_param('sss', $name, $rating, $review);
$success = $stmt->execute();
$stmt->close();
$conn->close();
if ($success) {
    json_response(['success' => true, 'message' => 'Review submitted successfully']);
}
json_response(['success' => false, 'message' => 'Could not save review'], 500);

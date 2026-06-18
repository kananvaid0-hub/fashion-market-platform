<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: dashboard.php?status=error');
    exit;
}
$table = $_POST['table'] ?? '';
$id = $_POST['id'] ?? '';
$action = $_POST['action'] ?? 'archive';
$allowed = ['feedback' => 'feedback', 'reviews' => 'reviews', 'payments' => 'payments'];
if (!isset($allowed[$table]) || !ctype_digit($id)) {
    header('Location: dashboard.php?status=error');
    exit;
}
$archiveValue = ($action === 'restore') ? 0 : 1;
$conn = get_db_connection();
$stmt = $conn->prepare("UPDATE {$allowed[$table]} SET archived = ? WHERE id = ?");
$stmt->bind_param('ii', $archiveValue, $id);
$stmt->execute();
$stmt->close();
$conn->close();
header('Location: dashboard.php?status=deleted');
exit;

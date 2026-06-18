<?php
require_once 'db.php';
$conn = get_db_connection();

$feedback = $conn->query('SELECT id, name, email, message, submitted_at FROM feedback WHERE archived = 0 ORDER BY submitted_at DESC');
$reviews = $conn->query('SELECT id, name, rating, review, submitted_at FROM reviews WHERE archived = 0 ORDER BY submitted_at DESC');
$payments = $conn->query('SELECT id, payment_method, order_items, submitted_at FROM payments WHERE archived = 0 ORDER BY submitted_at DESC');

$archivedFeedback = $conn->query('SELECT id, name, email, message, submitted_at FROM feedback WHERE archived = 1 ORDER BY submitted_at DESC');
$archivedReviews = $conn->query('SELECT id, name, rating, review, submitted_at FROM reviews WHERE archived = 1 ORDER BY submitted_at DESC');
$archivedPayments = $conn->query('SELECT id, payment_method, order_items, submitted_at FROM payments WHERE archived = 1 ORDER BY submitted_at DESC');

$feedbackCount = $conn->query('SELECT COUNT(*) AS count FROM feedback WHERE archived = 0')->fetch_assoc()['count'];
$reviewsCount = $conn->query('SELECT COUNT(*) AS count FROM reviews WHERE archived = 0')->fetch_assoc()['count'];
$paymentsCount = $conn->query('SELECT COUNT(*) AS count FROM payments WHERE archived = 0')->fetch_assoc()['count'];

$conn->close();

$statusMessage = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'deleted') {
        $statusMessage = 'Record archived/restored successfully.';
    } elseif ($_GET['status'] === 'error') {
        $statusMessage = 'Invalid request.';
    }
}

function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Fashion Market</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<nav>
    <h2>Fashion Market</h2>
    <input type="text" id="search" placeholder="Search Fashion">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="index.php#gallery">Gallery</a></li>
        <li><a href="index.php#trending">Trending</a></li>
        <li><a href="index.php#feedback">Feedback</a></li>
        <li><a href="index.php#payment">Payment</a></li>
        <li><a href="index.php#reviews">Reviews</a></li>
        <li><a href="index.php#cartsection">Cart</a></li>
    </ul>
</nav>

<section class="admin-section">
    <h2>Admin Dashboard</h2>
    <p>Manage feedback, reviews, and payments from the database.</p>
    <?php if ($statusMessage !== ''): ?>
        <p class="flash-message"><?= escape($statusMessage) ?></p>
    <?php endif; ?>

    <div class="dashboard-summary">
        <div class="summary-card">
            <h4>Feedback Submitted</h4>
            <p><?= escape($feedbackCount) ?></p>
        </div>
        <div class="summary-card">
            <h4>Reviews Submitted</h4>
            <p><?= escape($reviewsCount) ?></p>
        </div>
        <div class="summary-card">
            <h4>Payments Made</h4>
            <p><?= escape($paymentsCount) ?></p>
        </div>
    </div>

    <div class="dashboard-filters">
        <button type="button" class="filter-button active" data-filter="active">Active Records</button>
        <button type="button" class="filter-button" data-filter="archived">Archived Records</button>
    </div>

    <div id="active-records">
    <h3>Feedback Entries</h3>
    <table class="data-table">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Submitted At</th><th>Action</th></tr>
        </thead>
        <tbody>
            <?php while ($row = $feedback->fetch_assoc()): ?>
            <tr>
                <td><?= escape($row['id']) ?></td>
                <td><?= escape($row['name']) ?></td>
                <td><?= escape($row['email']) ?></td>
                <td><?= escape($row['message']) ?></td>
                <td><?= escape($row['submitted_at']) ?></td>
                <td><form class="delete-form" method="post" action="delete.php"><input type="hidden" name="table" value="feedback"><input type="hidden" name="id" value="<?= escape($row['id']) ?>"><input type="hidden" name="action" value="archive"><button type="submit" class="delete-button">Archive</button></form></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</section>

<footer>
    <h3>Fashion Market Dashboard</h3>
    <p>Manage and review saved data from the app.</p>
</footer>
<script src="dashboard.js"></script>
</body>
</html>
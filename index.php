<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Fashion Show</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<nav>
    <h2>Fashion Market</h2>
    <input type="text" id="search" placeholder="Search Fashion">
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#trending">Trending</a></li>
        <li><a href="#feedback">Feedback</a></li>
        <li><a href="#payment">Payment</a></li>
        <li><a href="#reviews">Reviews</a></li>
        <li><a href="#cartsection">🛒 Cart (<span id="cart">0</span>)</a></li>
    </ul>
</nav>

<section class="hero" id="home">
    <marquee behavior="scroll" direction="left">
        🔥 Welcome to Fashion Market Store | New Summer Collection Available | Up to 400% Off on Trending Styles
    </marquee>
    <h1>Online Fashion Show</h1>
    <p>Explore Latest Fashion Trends</p>
    <button onclick="showMessage()">Explore Collection</button>
</section>

<section id="gallery">
    <h2>Fashion Gallery</h2>
    <div class="gallery">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?w=500" alt="Summer Collection">
            <h3>Summer Collection</h3>
            <button onclick="addToCart('Summer Collection')">Add to Cart</button>
        </div>
        <div class="card">
            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=500" alt="Winter Collection">
            <h3>Winter Collection</h3>
            <button onclick="addToCart('Winter Collection')">Add to Cart</button>
        </div>
        <div class="card">
            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=500" alt="Party Wear">
            <h3>Party Wear</h3>
            <button onclick="addToCart('Party Wear')">Add to Cart</button>
        </div>
        <div class="card">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=500" alt="Traditional Wear">
            <h3>Traditional Wear</h3>
            <button onclick="addToCart('Traditional Wear')">Add to Cart</button>
        </div>
    </div>
</section>

<section id="trending">
    <h2>Trending Fashion</h2>
    <div class="gallery">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=500" alt="Street Style">
            <h3>Street Style</h3>
            <button onclick="addToCart('Street Style')">Add to Cart</button>
        </div>
        <div class="card">
            <img src="https://images.unsplash.com/photo-1495385794356-15371f348c31?w=500" alt="Formal Wear">
            <h3>Formal Wear</h3>
            <button onclick="addToCart('Formal Wear')">Add to Cart</button>
        </div>
    </div>
</section>

<section id="cartsection">
    <h2>Your Cart</h2>
    <ul id="cartList"></ul>
</section>

<section id="feedback">
    <h2>Feedback Form</h2>
    <form id="feedbackForm">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" rows="5" placeholder="Enter Feedback" required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>
</section>

<section id="payment">
    <h2>Payment</h2>
    <label>Select Payment Method:</label>
    <select id="paymentMethod" required>
        <option value="">Choose</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
        <option value="UPI">UPI</option>
        <option value="Cash on Delivery">Cash on Delivery</option>
    </select>
    <button onclick="checkout()">Proceed to Payment</button>
    <p id="paymentMessage"></p>
</section>

<section id="reviews">
    <h2>Customer Reviews</h2>
    <input type="text" id="customerName" placeholder="Enter Your Name">
    <textarea id="reviewText" placeholder="Write your review here"></textarea>
    <select id="rating">
        <option value="⭐⭐⭐⭐⭐">5 Stars</option>
        <option value="⭐⭐⭐⭐">4 Stars</option>
        <option value="⭐⭐⭐">3 Stars</option>
        <option value="⭐⭐">2 Stars</option>
        <option value="⭐">1 Star</option>
    </select>
    <button onclick="addReview()">Submit Review</button>
    <h3>Customer Feedback</h3>
    <div id="reviewList">
        <p>⭐⭐⭐⭐⭐ Excellent Collection!</p>
        <p>⭐⭐⭐⭐ Great Quality.</p>
    </div>
</section>

<footer>
    <h3>Online Fashion Show Project</h3>
    <p>Created Using HTML, CSS, JavaScript and PHP Backend</p>
</footer>

<script src="script.js"></script>
</body>
</html>
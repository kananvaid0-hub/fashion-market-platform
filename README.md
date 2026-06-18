# Fashion Market Platform

An online fashion show platform with HTML, CSS, JavaScript frontend and PHP/MySQL backend using XAMPP.

## Features

- **Responsive Fashion Gallery** - Browse summer, winter, party, and traditional wear
- **Shopping Cart** - Add/remove items from cart
- **Payment Integration** - Support for multiple payment methods
- **Customer Feedback** - Collect user feedback and reviews
- **Admin Dashboard** - Manage feedback, reviews, and payments
- **Archive/Restore** - Archive records and restore them later
- **Search Functionality** - Search active and archived records

## Setup with XAMPP

1. Copy project folder to `C:\xampp\htdocs\fashion-market`
2. Start Apache and MySQL from XAMPP Control Panel
3. Open `http://localhost/phpmyadmin`
4. Import `create_database.sql` to create database and tables
5. Access the app:
   - Frontend: `http://localhost/fashion-market/index.php`
   - Dashboard: `http://localhost/fashion-market/dashboard.php`

## Files

- `index.php` - Frontend entry point
- `dashboard.php` - Admin dashboard
- `script.js` - Frontend JavaScript
- `dashboard.js` - Dashboard interactivity
- `stylesheet.css` - Styling
- `db.php` - Database connection helper
- `feedback.php`, `reviews.php`, `payment.php` - API endpoints
- `delete.php` - Archive/restore handler
- `create_database.sql` - Database schema

## Default Database Credentials

- Host: `localhost`
- User: `root`
- Password: (empty)
- Database: `fashion_market`

Update `db.php` if your XAMPP credentials differ.

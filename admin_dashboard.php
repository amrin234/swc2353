<?php
session_start();

// Check if the user is not logged in or not an admin, redirect to the login page
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to barbershop.html
    header("Location: barbershop.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #009688;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        nav {
            background-color: #f4f4f4;
            padding: 15px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, Admin!</h1>
    </header>
    <nav>
        <ul>
            <li><a href="view_records.php">View Appointments</a></li>
            <li><a href="add_appointment.php">Add Appointment</a></li>
            <li><a href="search_appointment.php">Search Appointment</a></li>
            <li><a href="barbershop.html">Logout</a></li>
        </ul>
    </nav>
    <!-- Rest of your admin dashboard content -->
</body>
</html>

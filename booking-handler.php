<?php
// Create a database connection
$conn = new mysqli('localhost','root', '', 'barbershop_appointments');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$people = $_POST['people'];

// Insert data into the database
$sql = "INSERT INTO appointments (name, email, phone, date, time, people) VALUES ('$name', '$email', '$phone', '$date', '$time', $people)";

if ($conn->query($sql) === TRUE) {
    // Get the last inserted ID (appointment ID)
    $appointmentId = $conn->insert_id;
    
    // Display the receipt with the banner background and form header
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Receipt</title>
        <style>
            /* Set the background to the banner image */
            body {
                background: url("banner.jpg");
                background-size: cover;
                background-position: center;
                margin: 0;
                font-family: Arial, sans-serif;
                color: #333;
                height: 100vh;
            }
            .receipt {
                background-color: rgba(255, 255, 255, 0.9); /* Add a white background with some transparency */
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                text-align: center;
                margin: 100px auto; /* Center the receipt horizontally and apply margin for vertical centering */
            }
            h1 {
                background: #009688;
                color: #fff; /* Set the header text color to white */
                padding: 10px;
                border-radius: 5px;
                margin-top: 0;
                text-align: center;
            }
            p {
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
        <h1>Booking Receipt</h1>
        <div class="receipt">
            <p>Thank you for booking your appointment. Here is your booking receipt:</p>
            <p><strong>Appointment ID:</strong> ' . $appointmentId . '</p>
            <p><strong>Name:</strong> ' . $name . '</p>
            <p><strong>Email:</strong> ' . $email . '</p>
            <p><strong>Phone Number:</strong> ' . $phone . '</p>
            <p><strong>Preferred Date:</strong> ' . $date . '</p>
            <p><strong>Preferred Time:</strong> ' . $time . '</p>
            <p><strong>Number of People:</strong> ' . $people . '</p>
            <p>Our team will contact you to confirm your appointment. If you have any questions or need to make changes, please contact us with your appointment ID.</p>
        </div>
    </body>
    </html>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
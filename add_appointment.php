<?php
$is_admin = true;

if (!$is_admin) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file or establish a connection here
    $servername = "localhost";
    $username = "root";
    $password = ""; // Update with your database password
    $dbname = "barbershop_appointments";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get and sanitize form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];

    // Insert data into the database (use prepared statements in production to prevent SQL injection)
    $sql = "INSERT INTO appointments (name, email, phone, date, time, people) VALUES ('$name', '$email', '$phone', '$date', '$time', $people)";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_records.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Appointment</title>
    <style>
        /* Basic styling for the form */
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #009688;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #007a63;
        }
    </style>
</head>
<body>
    <h1>Add New Appointment</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="date">Preferred Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="time">Preferred Time:</label>
        <input type="time" id="time" name="time" required><br>

        <label for="people">Number of People:</label>
        <select id="people" name="people" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br>

        <input type="submit" value="Add Appointment">
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: 0 auto;
        }

        label, input, select {
            margin-bottom: 10px;
        }

        button {
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            background-color: #009688;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #007a63;
        }
    </style>
</head>
<body>
    <h2>Update Appointment Details</h2>
    <?php
    // Fetch appointment details based on the provided ID
    if(isset($_GET['id'])) {
        $conn = mysqli_connect("localhost", "root", "", "barbershop_appointments");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = $_GET['id'];
        $sql = "SELECT * FROM appointments WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <form action="update_process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?php echo $row['time']; ?>" required>
        <label for="people">Number of People:</label>
        <select id="people" name="people" required>
            <option value="1" <?php if ($row['people'] == 1) echo 'selected'; ?>>1</option>
            <option value="2" <?php if ($row['people'] == 2) echo 'selected'; ?>>2</option>
            <option value="3" <?php if ($row['people'] == 3) echo 'selected'; ?>>3</option>
            <option value="4" <?php if ($row['people'] == 4) echo 'selected'; ?>>4</option>
        </select>

        <button type="submit">Update</button>
    </form>
    <?php
        } else {
            echo "No result found for this ID.";
        }

        $conn->close();
    }
    ?>
</body>
</html>

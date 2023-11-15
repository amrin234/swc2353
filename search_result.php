<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Appointment Details</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        td a {
            color: #009688;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "barbershop_appointments");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['customer_id'])) {
        $customer_id = $_GET['customer_id'];

        // Retrieve record with the provided ID
        $sql = "SELECT * FROM appointments WHERE id=$customer_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Customer Appointment Details</h2>";
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>People</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["time"] . "</td>
                        <td>" . $row["people"] . "</td>
                        <td><a href='update_appointment.php?id=" . $row["id"] . "'>Update</a></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No result found for this ID.</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>

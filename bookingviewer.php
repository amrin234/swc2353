<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Queue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white; /* Background color set to white */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #009688;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
    // Connect to your database
    $conn = mysqli_connect("localhost", "root", "", "barbershop_appointments");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from appointments table
    $sql = "SELECT * FROM appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Preferred Date</th>
                    <th>Preferred Time</th>
                    <th>Number of People</th>
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
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>

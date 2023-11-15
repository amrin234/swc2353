<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Appointment</title>
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
            align-items: center;
            justify-content: center;
        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
    <h2>Search Appointment by Customer ID</h2>
    <form action="search_result.php" method="GET">
        <label for="customer_id">Customer ID:</label>
        <input type="text" id="customer_id" name="customer_id" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>

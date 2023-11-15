<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "barbershop_appointments");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record with the provided ID
    $sql = "DELETE FROM appointments WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

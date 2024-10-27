<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "clinic") or die("Connection failed: " . $conn->connect_error);

// Retrieve appointment ID from URL parameter
$appointment_id = $_GET['id'];

// Query to retrieve appointment details
$result = mysqli_query($conn, "SELECT * FROM appointments WHERE id = '$appointment_id'");
$row = mysqli_fetch_assoc($result);

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];

    // Update the appointment date and time
    $update_query = "UPDATE appointments SET appointment_date = '$new_date $new_time' WHERE id = '$appointment_id'";
    if ($conn->query($update_query) === TRUE) {
        echo "Appointment date and time updated successfully.";
    } else {
        echo "Error updating appointment: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Appointment</title>
</head>
<body>

    <h2>Modify Appointment</h2>

    <form action="" method="post">
        <label for="new_date">New Date:</label>
        <input type="date" id="new_date" name="new_date" value="<?php echo date('Y-m-d', strtotime($row['appointment_date'])); ?>"><br><br>
        <label for="new_time">New Time:</label>
        <input type="time" id="new_time" name="new_time" value="<?php echo date('H:i', strtotime($row['appointment_date'])); ?>"><br><br>
        <input type="submit" value="Update Appointment">
    </form>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

  
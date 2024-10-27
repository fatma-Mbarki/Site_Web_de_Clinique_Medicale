<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "clinic") or die("Connection failed: " . $conn->connect_error);

    // Retrieve patient ID from form submission
    $patient_id = $_POST['patient_id'];

    // Query to retrieve appointments of the specified patient
    $result = mysqli_query($conn,"SELECT * FROM appointments WHERE patient_id = '$patient_id'");

    if ($result)
    {
            // Output the appointments in a table with modify and delete options
            echo "<h2>Patient Appointments</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Appointment Date</th>
                        <th>Actions</th>
                    </tr>";
            while ($row=mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>
                        <a href='modify_appointment.php?id=" . $row[0] . "'>Modify</a>
                        <a href='delete_appointment.php?id=" . $row[0] . "'>Delete</a>
                    </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No appointments found for this patient.";
        }
    
    
    
    // Close the database connection
    $conn->close();
?>

    
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointment</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="clinic.css">
    <script src="myapp.js" ></script>
</head>

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> <strong>WC</strong>medical </a>

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="services.php">services</a>
        <a href="doctors.php">doctors</a>
        <a href="appointment.php">appointment</a>
        <a href="MyApp.php">My appointment</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>
<body>
    <h1 class="heading"> <span>My</span>Appointment </h1> 
        <section class="myappointment" id="myAppointment">
            <div class="row">
                
                <form action="MyApp.php" method="post" name="ID">
                    
                    <input type="text"name="patient_id"  placeholder="your cin" class="box">
                    
                    <button type="submit" class="btn">Submit</button>
                </form>
                
            </div>
        </section>
    

<?php

// Database connection
$conn = new mysqli("localhost", "root", "", "clinic") or die("Connection failed: " . $conn->connect_error);

// Retrieve patient ID from form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $patient_id = $_POST['patient_id'];

    // Query to retrieve appointments of the specified patient
    $result = mysqli_query($conn, "SELECT * FROM appointments WHERE patient_id = '$patient_id'");

    if ($result) {
        // Output the appointments in a table with modify and delete options
        
        echo"<section class='MyApp'>";
            echo"<div class='row'>";
                echo "<h3>Patient Appointments</h3>";
                echo "<table border='2'>
                        <tr>
                            <th>Appointment Date</th>
                            <th>Modify</th>
                            <th>Delete</th>
                        </tr>";
                while ($row = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td><button class='btn'><a href='MyApp.php?id=" . $row[0] . "&action=modify'>Modify</a></button></td>";
                    echo "<td><button class='btn'><a href='MyApp.php?id=" . $row[0] . "&action=delete'>Delete</a></button></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>No appointments found for this patient.</h2>";
            }
        echo"</div>";
    echo"</section>";
}

// Process form submission for modifying appointment
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'modify') {
    $appointment_id = $_GET['id'];

    // Query to retrieve appointment details
    $result = mysqli_query($conn, "SELECT * FROM appointments WHERE id = '$appointment_id'");
    $row = mysqli_fetch_assoc($result);

    // Modify appointment
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_date = $_POST['new_date'];
        $new_time = $_POST['new_time'];

        // Update the appointment date and time
        $update_query = "UPDATE appointments SET appointment_date = '$new_date $new_time' WHERE id = '$appointment_id'";
        if (mysqli_query($conn,$update_query) === TRUE) {
            echo "<h2>Appointment date and time updated successfully.</h2>";
            // Redirect to the initial page after updating
            header("Location: MyApp.php");
            exit(); // Terminate script execution after redirection
        } else {
            echo "<h2>Error updating appointment: </h2>". $conn->error;
        }
    }
    // Display form to modify appointment
    echo"<section class='MyApp'>";
        echo"<div class='row'>";
            echo "<h3>Modify Appointment</h3>";
            echo "<form action='' method='post'name='modify_app' onsubmit='validateModify()' >
                    <label for='new_date'><span class='faza'>New Date:</span></label>
                    <input type='date' id='new_date' name='new_date' class='box' value='" . date('Y-m-d', strtotime($row['appointment_date'])) . "'><br><br>
                    <label for='new_time'><span class='faza'>New Time:</span></label>
                    <input type='time' id='new_time'  class='box' name='new_time' value='" . date('H:i', strtotime($row['appointment_date'])) . "'><br><br>
                    <input type='submit' class='btn' value='Update Appointment'>

                </form>";
        echo"</div>";
    echo"</section>";
}



//process for deleting appointement 

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    
    $appointment_id = $_GET['id'];
    // Query to retrieve appointment details
    $result = mysqli_query($conn, "SELECT * FROM appointments WHERE id = '$appointment_id'");
   

        $delete_query=mysqli_query($conn,"delete from appointments where id='$appointment_id'");
        if ($delete_query){
            echo "<h2>Appointment deleted successfully.</h2>";
            header("Location: MyApp.php");
            exit();
        } else {
            echo "Error deleting appointment: " . $conn->error;
        }
     
}

// Close the database connection
$conn->close();
?>
<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>our services</h3>
            <a href="services.php"> <i class="fas fa-chevron-right"></i> free checkups </a>
            <a href="services.php"> <i class="fas fa-chevron-right"></i> expert doctors  </a>
            <a href="services.php"> <i class="fas fa-chevron-right"></i> medicines </a>
            <a href="services.php"> <i class="fas fa-chevron-right"></i> ambulance service </a>
        </div>

        <div class="box">
        <h3>appointment info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +21672882380 </a>
                <a href="#"> <i class="fas fa-phone"></i> +216778254697 </a>
                <a href="#"> <i class="fas fa-envelope"></i> wcmedical@gmail.com </a>
                <a href="#"> <i class="fas fa-envelope"></i> wecaremedical@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Tunisia,Sfax </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>
</section>
</body>


   

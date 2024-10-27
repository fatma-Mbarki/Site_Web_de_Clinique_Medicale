<?php
// Database connection
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"clinic");
    
    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id=$_POST["id"];
        $name = $_POST["name"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $app_date = $_POST['app_date'];
        $app_time = $_POST['app_time'];
        $doctor_id = $_POST["doctor"];

        $resultat=mysqli_query($conn,"SELECT id FROM patients WHERE id = '$id'");
        if(mysqli_num_rows($resultat)>0){
            // Patient already exists, retrieve their ID
            $patient_row =$resultat->fetch_assoc();
            $patient_id = $patient_row["id"];
        } else {
            // Insert new patient
            $insert_patient_query = "INSERT INTO patients (id, name, number, email) VALUES ('$id', '$name', '$number', '$email')";
            if ($conn->query($insert_patient_query) === TRUE) {
                $patient_id = $id;
            } else {
                echo "Error inserting patient: " . $conn->error;
                exit(); // Exit the script if an error occurs
            }
        }

        // Check if the doctor has another appointment at the selected time

        $existing_appointment_result = mysqli_query($conn,"SELECT * FROM appointments WHEor_id RE doct= '$doctor_id' AND appointment_date = '$app_date'.'$app_time'");

        if ($existing_appointment_result!= 0) {
            echo "The selected doctor already has an appointment at the selected time. Please choose a different time.";
        } else {
            // Insert data into the appointments table
        
            if (mysqli_query($conn,"INSERT INTO appointments (patient_id, doctor_id, appointment_date) VALUES ('$patient_id', '$doctor_id','$app_date $app_time')") === TRUE) {
               // $success_message = "Appointment made successfully!";
                header('location:appointment.php');
                exit();
            } else {
                echo "Error: ". $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
?>


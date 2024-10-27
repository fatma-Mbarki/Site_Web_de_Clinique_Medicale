<?php
// Establish database connection
$conn=mysqli_connect("localhost","root","") or die("probleme de connexion au serveur de la BD");
// Fetch doctors from the database
$bd=mysqli_select_db($conn,"clinic");
$result=mysqli_query($conn,"SELECT id, name,service FROM doctors");

// Check if there are any doctors
if ($result->num_rows > 0) {
    // Doctors found, populate the dropdown menu
    $doctors = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // No doctors found
    $doctors = [];
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>home</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="clinic.css">
        <script src="clinic.js" ></script>
    </head>
        
    <!-- header section starts  -->

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
    <!-- body section starts  -->
    <body>
        <section class="appointment" id="appointment">

            <h1 class="heading"> <span>appointment</span> now </h1>  
        
            <div class="row">
        
                <div class="image">
                    <img src="image/appointment-img.svg" alt="">
                </div>
                <form name="form" action="process_form.php" method="post" onsubmit="return validateForm()" >
                <?php
                    if(isset($message)) {
                        foreach($message as $message) {
                        echo'<p class ="message">'.$message.'</p>';
                    }
                    }
                ?>
            
                    <h3>make appointment</h3>
                    <input type="text"name="id" placeholder="your cin" class="box">
                    <input type="text"name="name" placeholder="your name" class="box">
                    <input type="text"name="lastname" placeholder="your last name" class="box">
                    <input type="tel" name="number" placeholder="your number" class="box">
                    <input type="email"name="email" placeholder="your email" class="box">

                    <input type="date"name="app_date"   class="box">
                    <input type="time" name="app_time"  class="box">

                    <select name="doctor" class="box">
                        <option value="">Select a doctor</option>
                        <?php
                            // Assuming $doctors is an array containing doctor information retrieved from the database
                            foreach ($doctors as $doctor) {
                                echo '<option value="' . $doctor['id'] . '">' . $doctor['name'] . ' - ' . $doctor['service'] . '</option>';
                            
                            }
                        ?>


                    <input type="submit" name="submit" value="appointment now" class="btn">
                </form>
                <div id="successMessage"></div>

        
            </div>
        
        </section>
    </body>

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

        </div>
        <div class="credit"> created by <span>Fatma Mbarki</span> | all rights reserved </div>


    </section>

    
</html>

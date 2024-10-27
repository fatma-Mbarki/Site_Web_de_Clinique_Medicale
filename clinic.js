// Function to validate form inputs
function validateForm() {
    var id = document.form.id.value;
    var name = document.form.name.value;
    var lastname = document.form.lastname.value;
    var number = document.form.number.value;
    var email = document.form.email.value;
    var app_date = document.form.app_date.value;
    var app_time = document.form.app_time.value;
    var doctor = document.form.doctor.value;

    // Check if any field is empty
    if (id == "" || name == "" || lastname == "" || number == "" || email == "" || app_date == "" || app_time == "" || doctor == "") {
        alert("All fields must be filled out");
        return false;
    }

    // Validate ID format (8-digit number)
    if (!id.match(/^\d{8}$/)) {
        alert("ID must be an 8-digit number");
        return false;
    }

    // Validate name and last name format (only letters)
    if (!name.match(/^[A-Za-z]+$/) || !lastname.match(/^[A-Za-z]+$/)) {
        alert("Name and last name must contain only letters");
        return false;
    }

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailRegex)) {
        alert("Invalid email format");
        return false;
    }

    // Validate appointment time (between 8 AM and 5 PM)
    var timeParts = app_time.split(":");
    var hours = parseInt(timeParts[0]);
    if (hours < 8 || hours > 17) {
        alert("Appointment time must be between 8 AM and 5 PM");
        return false;
    }

    // Validate appointment date (Monday to Friday)
    var dateObj = new Date(app_date);
    var dayOfWeek = dateObj.getDay();
    if (dayOfWeek === 0 || dayOfWeek === 6) {
        alert("Appointment date must be a weekday (Monday to Friday)");
        return false;
    }


    return true;
}


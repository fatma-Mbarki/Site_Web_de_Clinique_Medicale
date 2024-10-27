function validateModify() {
    var new_date = document.modify_app.new_date.value;
    var new_time = document.modify_app.new_time.value;

    var timeParts = app_time.split(":");
    var hours = parseInt(timeParts[0]);
    if (hours < 8 || hours > 17) {
        alert("Appointement time must be between 8 AM and 5 PM");
        return false;
    }

    var dateObj = new Date(app_date);
    var dayOfWeek = dateObj.getDay();
    if (dayOfWeek === 0 || dayOfWeek === 6) {
        alert("Appointment date must be a weekday (Monday to Friday)");
        return false;
    }
    return True ;
}
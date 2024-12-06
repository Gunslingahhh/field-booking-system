var booking_date = document.getElementById('booking_date');

booking_date.addEventListener('change', function() {
    // Code to execute when the date is changed
    const selectedDate = this.value;
    console.log("Selected date:", selectedDate);
});
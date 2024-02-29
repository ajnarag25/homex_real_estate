
    // Get the input element
    var timeInput = document.getElementById('time_sched');
    // Add event listener for input change
    timeInput.addEventListener('input', function() {
    // Parse the input value as time
    var timeValue = new Date('2024-01-01T' + this.value + ':00');

    // Get hours from the parsed time
    var hours = timeValue.getHours();

    // Check if time is between 5am and 5pm
    if (hours < 5 || hours >= 17) {
        // If not, reset the value
        this.setCustomValidity('Time must be between 5am and 5pm.');
    } else {
        this.setCustomValidity('');
    }
});

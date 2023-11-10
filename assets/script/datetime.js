    // Get current date and time
    var now = new Date();

    // Extract hours, minutes, and seconds in 24-hour format
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');

    // Create a string in the format "HH:mm:ss"
    var time = hours + '.' + minutes

    // Insert date and time into HTML
    document.getElementById("datetime").innerHTML = time;
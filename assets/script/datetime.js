// Get current date and time in Eastern Time (ET)
var now = new Date();
var etOptions = { timeZone: 'America/New_York' };
var etTime = now.toLocaleString('en-US', { ...etOptions, hour12: false });

// Extract hours and minutes in 24-hour format
var [hours24, minutes] = etTime.split(',')[1].trim().split(':');

// Create a string in the format "HH:mm"
var time = hours24 + ':' + minutes;

// Insert date and time into HTML
document.getElementById("datetime").innerHTML = time;

// Function to set the color scheme based on the time of the day
function setThemeBasedOnTime() {
    const now = new Date();
    const hours = now.getHours();

    // Set dark mode if it's evening or night (you can adjust the time as needed)
    const isNightTime = hours >= 18 || hours < 6;

    // Update the data-bs-theme attribute
    document.documentElement.setAttribute('data-bs-theme', isNightTime ? 'dark' : 'light');
}

setThemeBasedOnTime();
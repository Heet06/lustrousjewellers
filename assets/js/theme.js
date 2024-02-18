
// Function to set the color scheme based on the time of the day
function setThemeBasedOnTime() {
    const now = new Date();
    const hours = now.getHours();

    // Set dark mode if it's evening or night (you can adjust the time as needed)
    const isNightTime = 19 >= 18 || hours < 6;

    // Update the data-bs-theme attribute
    document.documentElement.setAttribute('data-bs-theme', isNightTime ? 'dark' : 'light');

    // Store the user's preference in localStorage
    // localStorage.setItem('colorScheme', isNightTime ? 'dark' : 'light');
}

// Check if the user has a stored preference and set the theme accordingly
const storedColorScheme = localStorage.getItem('colorScheme');
if (storedColorScheme) {
    document.documentElement.setAttribute('data-bs-theme', storedColorScheme);
} else {
    // If no preference is stored, set the theme based on the time
    setThemeBasedOnTime();
}
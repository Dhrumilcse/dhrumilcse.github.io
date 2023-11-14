// Check if the user prefers dark mode
const prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

// Set the og:image based on the color scheme preference
const ogImage = prefersDarkMode ? darkImageURL : lightImageURL;

document.querySelector('meta[property="og:image"]').setAttribute('content', ogImage);
document.querySelector('meta[property="twitter:image"]').setAttribute('content', ogImage);
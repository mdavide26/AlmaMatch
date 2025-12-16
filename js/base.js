const setTheme = () => {
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    document.documentElement.setAttribute('data-bs-theme', prefersDark ? 'dark' : 'light');
};

setTheme();

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', setTheme);
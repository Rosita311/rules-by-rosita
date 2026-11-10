const getTheme = () => {
  const saved = localStorage.getItem("theme");
  if (saved === "light") {
    return "light";
  } else if (saved === "dark") {
    return "dark";
  } else {
    return "system";
  }
};

const applyTheme = (theme) => {
  const root = document.documentElement;
  root.dataset.theme = theme;
  const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  const isDark = theme === "dark" || (theme === "system" && prefersDark);
  // tijdelijk, tot de CSS op data-theme draait
  root.classList.toggle("darkmode", isDark);
  root.style.colorScheme = isDark ? "dark" : "light";
};

const setTheme = (theme) => {
  localStorage.setItem("theme", theme);
  applyTheme(theme);
};

export function initThemeSwitcher() {
  const themeSwitch = document.getElementById("theme-switch");
  const root = document.documentElement;

  if (!themeSwitch) {
    localStorage.removeItem("darkmode");
    const prefersDark = window.matchMedia(
      "(prefers-color-scheme: dark)",
    ).matches;
    root.classList.toggle("darkmode", prefersDark);
    root.style.colorScheme = prefersDark ? "dark" : "light";
    return;
  }

  localStorage.removeItem("darkmode");
  applyTheme(getTheme());
}

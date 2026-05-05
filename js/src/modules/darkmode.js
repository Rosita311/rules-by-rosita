export function initDarkmode() {
  const themeSwitch = document.getElementById("theme-switch");
  const root = document.documentElement;

  if (!themeSwitch) {
    localStorage.removeItem("darkmode");
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
    root.classList.toggle("darkmode", prefersDark);
    root.style.colorScheme = prefersDark ? "dark" : "light";
    return;
  }

  let darkmode = localStorage.getItem("darkmode");

  const enableDarkmode = () => {
    root.classList.add("darkmode");
    root.style.colorScheme = "dark";
    localStorage.setItem("darkmode", "active");
    themeSwitch.setAttribute("aria-label", "Donker thema uitschakelen");
    themeSwitch.setAttribute("aria-pressed", "true");
  };

  const disableDarkmode = () => {
    root.classList.remove("darkmode");
    root.style.colorScheme = "light";
    localStorage.setItem("darkmode", "inactive");
    themeSwitch.setAttribute("aria-label", "Donker thema inschakelen");
    themeSwitch.setAttribute("aria-pressed", "false");
  };

  if (darkmode === "active") {
    enableDarkmode();
  } else if (darkmode === "inactive") {
    disableDarkmode();
  } else {
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
      enableDarkmode();
    } else {
      disableDarkmode();
    }
  }

  themeSwitch.addEventListener("click", () => {
    darkmode = localStorage.getItem("darkmode");
    if (darkmode !== "active") {
      enableDarkmode();
    } else {
      disableDarkmode();
    }
  });
}

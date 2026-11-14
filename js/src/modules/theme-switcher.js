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
};

const setTheme = (theme) => {
  localStorage.setItem("theme", theme);
  applyTheme(theme);
};

export function initThemeSwitcher() {
  const themeSwitch = document.getElementById("theme-switch");
  const themeMenu = document.getElementById("theme-menu");
  const switcher = document.querySelector(".theme-switcher");
  const radios = document.querySelectorAll('input[name="theme"]');

  localStorage.removeItem("darkmode");

  if (!themeSwitch) {
    applyTheme("light");
    return;
  }

  // Functies
  const closeMenu = () => {
    themeSwitch.setAttribute("aria-expanded", "false");
    themeMenu.hidden = true;
  };

  const openMenu = () => {
    themeSwitch.setAttribute("aria-expanded", "true");
    themeMenu.hidden = false;
  };

  // Beginstand
  const theme = getTheme();
  applyTheme(theme);

  // Radio's: juiste aanvinken + luisteren naar een nieuwe keuze
  radios.forEach((radio) => {
    radio.checked = radio.value === theme;
    radio.addEventListener("change", () => {
      setTheme(radio.value);
    });
  });

  // Event listeners
  themeSwitch.addEventListener("click", () => {
    const isOpen = themeSwitch.getAttribute("aria-expanded") === "true";
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  switcher.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !themeMenu.hidden) {
      closeMenu();
      themeSwitch.focus();
    }
  });

  switcher.addEventListener("focusout", (e) => {
    if (e.relatedTarget && !switcher.contains(e.relatedTarget)) {
      closeMenu();
    }
  });

  document.addEventListener("click", (e) => {
    if (!switcher.contains(e.target)) {
      closeMenu();
    }
  });
};

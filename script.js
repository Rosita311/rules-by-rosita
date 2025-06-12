// Fallback for Javascript disabled
document.documentElement.classList.replace("no-js", "js");

// Menu
const openButton = document.getElementById("open-sidebar-button");
const navbar = document.getElementById("header-nav");
const overlay = document.getElementById("overlay");
const media = window.matchMedia("(width < 1023px)");
const mainContent = document.getElementById("main-content");
const menuButtons = document.querySelector(".menu-buttons");
const footer = document.querySelector(".footer-container");
const navLinks = document.querySelectorAll("#header-nav a");

// Toegankelijkheidselementen selecteren
const toggleButton = document.getElementById("accessibility-toggle");
const panel = document.getElementById("accessibility-settings");
const closeButton = document.getElementById("close-accessibility");

let activeFocusTrap = null;
let escKeyHandler = null;

// Trap focus within the sidebar and accessibility menu when open

const trapFocus = (container) => {
  const isVisible = (el) =>
    !!(el.offsetWidth || el.offsetHeight || el.getClientRects().length);

  const focusableSelectors =
    'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])';

  const handleTrap = (e) => {
    if (e.key === "Tab") {
      const focusableEls = Array.from(
        container.querySelectorAll(focusableSelectors)
      ).filter((el) => !el.hasAttribute("disabled") && isVisible(el));

      const firstEl = focusableEls[0];
      const lastEl = focusableEls[focusableEls.length - 1];

      if (e.shiftKey && document.activeElement === firstEl) {
        e.preventDefault();
        lastEl.focus();
      } else if (!e.shiftKey && document.activeElement === lastEl) {
        e.preventDefault();
        firstEl.focus();
      }
    }
  };

  container.addEventListener("keydown", handleTrap);
  container.setAttribute("data-trap-bound", "true");

  return () => {
    container.removeEventListener("keydown", handleTrap);
    container.removeAttribute("data-trap-bound");
  };
};

const activateTrap = (container) => {
  if (typeof activeFocusTrap === "function") {
    activeFocusTrap(); // verwijder oude trap
  }
  activeFocusTrap = trapFocus(container);
};

const deactivateTrap = () => {
  if (typeof activeFocusTrap === "function") {
    activeFocusTrap();
    activeFocusTrap = null;
  }
};

// sidebar

const openSidebar = () => {
  navbar.classList.add("show");
  document.body.classList.add("menu-open");
  openButton.setAttribute("aria-expanded", "true");

  if (media.matches) {
    activateTrap(navbar);
    navbar.removeAttribute("inert");
    mainContent.setAttribute("inert", "");
    menuButtons.setAttribute("inert", "");
    footer.setAttribute("inert", "");
    overlay.style.display = "block";
    if (toggleButton) toggleButton.style.display = "none";
  }

  escKeyHandler = (e) => {
    if (e.key === "Escape") {
      closeSidebar();
    }
  };
  document.addEventListener("keydown", escKeyHandler);
};

const closeSidebar = () => {
  navbar.classList.remove("show");
  document.body.classList.remove("menu-open");
  openButton.setAttribute("aria-expanded", "false");
  if (media.matches) {
    deactivateTrap();
    navbar.setAttribute("inert", "");
    mainContent.removeAttribute("inert");
    menuButtons.removeAttribute("inert");
    footer.removeAttribute("inert");
    overlay.style.display = "none";
    if (toggleButton) toggleButton.style.display = "block";
  }
  openButton.focus();
};

navLinks.forEach((link) => {
  link.addEventListener("click", closeSidebar);
  link.removeAttribute("aria-current");

  if (link.href === window.location.href) {
    link.setAttribute("aria-current", "page");
  }
});

const updateNavbar = (e) => {
  const isMobile = e.matches;

  if (isMobile) {
    activateTrap(navbar);
    navbar.setAttribute("inert", "");
    if (navbar.classList.contains("show")) {
      toggleButton.style.display = "none";
    }
  } else {
    deactivateTrap();
    navbar.removeAttribute("inert");
    mainContent.removeAttribute("inert");
    menuButtons.removeAttribute("inert");
    footer.removeAttribute("inert");
    navbar.classList.remove("show");
    overlay.style.display = "none";
    openButton.setAttribute("aria-expanded", "false");
    toggleButton.style.display = "block";
  }
};

media.addEventListener("change", updateNavbar);
updateNavbar(media);

// Submenu
document.addEventListener("DOMContentLoaded", () => {
  const submenuToggles = document.querySelectorAll(".submenu-toggle");
  let isMouseUser = false;

  // Detecteer muisgebruik
  window.addEventListener(
    "mousemove",
    () => {
      isMouseUser = true;
    },
    { once: true }
  ); // Alleen eerste keer nodig

  submenuToggles.forEach((button) => {
    const parentItem = button.closest(".has-submenu");
    const submenu = parentItem.querySelector(".submenu");

    let hoverOpenTimeout, hoverCloseTimeout;

    const openSubmenu = () => {
      closeAllSubmenus();
      parentItem.classList.add("open");
      button.setAttribute("aria-expanded", "true");
      button.setAttribute("aria-pressed", "true");
      button.setAttribute("aria-label", "Submenu sluiten");
    };

    const closeSubmenu = () => {
      parentItem.classList.remove("open");
      button.setAttribute("aria-expanded", "false");
      button.setAttribute("aria-pressed", "false");
      button.setAttribute("aria-label", "Submenu openen");
    };

    const closeAllSubmenus = () => {
      document.querySelectorAll(".has-submenu.open").forEach((item) => {
        item.classList.remove("open");
        const toggle = item.querySelector(".submenu-toggle");
        toggle?.setAttribute("aria-expanded", "false");
        toggle?.setAttribute("aria-pressed", "false");
        toggle?.setAttribute("aria-label", "Submenu openen");
      });
    };

    // Klikgedrag voor touch/keyboard
    button.addEventListener("click", (e) => {
      if (isMouseUser && window.innerWidth > 992) {
        // Negeer klik als muisgebruiker op desktop
        return;
      }
      e.preventDefault();
      const isOpen = parentItem.classList.contains("open");
      isOpen ? closeSubmenu() : openSubmenu();
    });

    button.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault(); // voorkom scroll bij spatie
        const isOpen = parentItem.classList.contains("open");
        isOpen ? closeSubmenu() : openSubmenu();
      }
    });

    // Hovergedrag op desktop
    parentItem.addEventListener("mouseenter", () => {
      if (isMouseUser && window.innerWidth > 992) {
        clearTimeout(hoverCloseTimeout);
        hoverOpenTimeout = setTimeout(openSubmenu, 300);
      }
    });

    parentItem.addEventListener("mouseleave", () => {
      if (isMouseUser && window.innerWidth > 992) {
        clearTimeout(hoverOpenTimeout);
        hoverCloseTimeout = setTimeout(closeSubmenu, 300);
      }
    });

    // Sluit submenu bij klik buiten het menu
    document.addEventListener("click", (e) => {
      if (!parentItem.contains(e.target)) {
        closeSubmenu();
      }
    });

    // Escape sluit submenu
    submenu?.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        closeSubmenu();
        button.focus();
      }
    });
  });
});

// Darkmode

document.addEventListener("DOMContentLoaded", () => {
  const themeSwitch = document.getElementById("theme-switch");
  let darkmode = localStorage.getItem("darkmode");
  const root = document.documentElement;

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

  if (!darkmode) {
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
      darkmode = "active";
    } else {
      darkmode = "inactive";
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
});

// Keyboard navigation
document.body.addEventListener("keydown", () => {
  document.body.classList.add("user-is-tabbing");
});

document.body.addEventListener("mousedown", () => {
  document.body.classList.remove("user-is-tabbing");
});

// Back to top button
const backToTop = document.querySelector(".back-to-top");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    backToTop.classList.add("show");
    backToTop.removeAttribute("aria-hidden");
    backToTop.removeAttribute("tabindex");
  } else {
    backToTop.classList.remove("show");
    backToTop.setAttribute("aria-hidden", "true");
    backToTop.setAttribute("tabindex", "-1");
  }
});

backToTop.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
  document.getElementById("top").focus();
});

// Accessibility settings

// Koppeling tussen checkbox-ID's en CSS-klassen
const settingsMap = {
  "toggle-text": "large-text",
  "toggle-contrast": "high-contrast",
  "toggle-dyslexic": "dyslexic-font",
  "toggle-reduce-motion": "reduce-motion",
};

// Paneel openen/sluiten via klik
toggleButton.addEventListener("click", () => {
  togglePanel();
});

// Ook openen/sluiten met Enter of Spatie
toggleButton.addEventListener("keydown", (e) => {
  if (e.key === "Enter" || e.key === " ") {
    e.preventDefault();
    togglePanel();
  }
});

// Sluitknop sluit het paneel
closeButton.addEventListener("click", () => {
  closePanel();
});

// Escape sluit het paneel
panel.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    closePanel();
  }
});

document
  .querySelector('a[href="#accessibility-settings"]')
  .addEventListener("click", (e) => {
    e.preventDefault();

    panel.classList.add("show");
    panel.setAttribute("aria-hidden", "false");

    const firstFocusable = panel.querySelector(
      'button, [tabindex]:not([tabindex="-1"])'
    );
    firstFocusable?.focus();

    activateTrap(panel);
  });

// Functies

const togglePanel = () => {
  const isVisible = panel.classList.toggle("show");
  panel.setAttribute("aria-hidden", !isVisible);
  toggleButton.setAttribute("aria-expanded", isVisible);

  if (isVisible) {
    // Focus verplaatsen naar de titel met aria-live
    const heading = panel.querySelector("#accessibility-heading");
    if (heading) {
      setTimeout(() => {
        heading.focus();
      }, 150);
    }

    activateTrap(panel);
  } else {
    deactivateTrap();
    toggleButton.focus();
  }
};

const closePanel = () => {
  deactivateTrap();
  panel.classList.remove("show");
  panel.setAttribute("aria-hidden", "true");
  toggleButton.setAttribute("aria-expanded", "false");
  toggleButton.focus();
};

// Instellingen bijhouden in localStorage

const accessibilityOptions = {
  "toggle-dyslexic": "dyslexic-font",
  "toggle-contrast": "high-contrast",
  "toggle-text": "large-text",
  "toggle-reduce-motion": "reduce-motion",
};

// Theme-toggle verbergen bij hoog contrast
function updateThemeToggleVisibility() {
  const themeToggle = document.getElementById("theme-toggle");
  const isHighContrast = document.body.classList.contains("high-contrast");
  if (themeToggle) {
    themeToggle.style.display = isHighContrast ? "none" : "";
  }
}

// Icon updaten op basis van status
function updateButtonIcon(button, state) {
  const iconOn = button.querySelector(".icon-on");
  const iconOff = button.querySelector(".icon-off");

  if (iconOn && iconOff) {
    iconOn.style.display = state ? "inline" : "none";
    iconOff.style.display = state ? "none" : "inline";
  }
}

// Instelling aan/uitzetten
function toggleSetting(button, className) {
  const isActive = button.getAttribute("aria-pressed") === "true";
  const newState = !isActive;

  button.setAttribute("aria-pressed", String(newState));
  document.body.classList.toggle(className, newState);
  localStorage.setItem(className, newState);

  const target =
    className === "large-text" ? document.documentElement : document.body;
  target.classList.toggle(className, newState);

  if (className === "large-text") {
    document.documentElement.classList.toggle(className, newState);
  } else {
    document.body.classList.toggle(className, newState);
  }
  localStorage.setItem(className, newState);

  updateButtonIcon(button, newState);
  if (className === "high-contrast") {
    updateThemeToggleVisibility();
  }
}

// Herstel bij laden
function restoreSettings() {
  Object.entries(accessibilityOptions).forEach(([buttonId, className]) => {
    const button = document.getElementById(buttonId);
    const savedState = localStorage.getItem(className) === "true";

    button.setAttribute("aria-pressed", String(savedState));
    const target =
      className === "large-text" ? document.documentElement : document.body;
    target.classList.toggle(className, savedState);

    updateButtonIcon(button, savedState);

    button.addEventListener("click", () => toggleSetting(button, className));
  });

  updateThemeToggleVisibility();
}

// Resetknop
function setupResetButton() {
  const resetBtn = document.getElementById("reset-accessibility");
  if (!resetBtn) return;

  resetBtn.addEventListener("click", () => {
    Object.entries(accessibilityOptions).forEach(([buttonId, className]) => {
      const button = document.getElementById(buttonId);
      const target =
        className === "large-text" ? document.documentElement : document.body;
      target.classList.remove(className);

      button.setAttribute("aria-pressed", "false");
      localStorage.removeItem(className);
      updateButtonIcon(button, false);
    });
    updateThemeToggleVisibility();
  });
}

window.addEventListener("DOMContentLoaded", () => {
  restoreSettings();
  setupResetButton();
});

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

let currentTrapHandler = null;
let escKeyHandler = null;

// Trap focus within the sidebar when open

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

  return handleTrap;
};

const openSidebar = () => {
  navbar.classList.add("show");
  document.body.classList.add("menu-open");
  openButton.setAttribute("aria-expanded", "true");

  if (media.matches) {
    currentTrapHandler = trapFocus(navbar);
    navbar.removeAttribute("inert");
    mainContent.setAttribute("inert", "");
    menuButtons.setAttribute("inert", "");
    footer.setAttribute("inert", "");
    overlay.style.display = "block";
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
    navbar.setAttribute("inert", "");
    mainContent.removeAttribute("inert");
    menuButtons.removeAttribute("inert");
    footer.removeAttribute("inert");
    overlay.style.display = "none";
  }
  openButton.focus();

  if (currentTrapHandler) {
    navbar.removeEventListener("keydown", currentTrapHandler);
    navbar.removeAttribute("data-trap-bound");
    currentTrapHandler = null;
  }

  if (escKeyHandler) {
    document.removeEventListener("keydown", escKeyHandler);
    escKeyHandler = null;
  }
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
  console.log("Screen changed. Mobile view:", isMobile);

  if (isMobile) {
    navbar.setAttribute("inert", "");
  } else {
    navbar.removeAttribute("inert");
    mainContent.removeAttribute("inert");
    menuButtons.removeAttribute("inert");
    footer.removeAttribute("inert");

    navbar.classList.remove("show");
    overlay.style.display = "none";
    openButton.setAttribute("aria-expanded", "false");

    if (currentTrapHandler) {
      navbar.removeEventListener("keydown", currentTrapHandler);
      navbar.removeAttribute("data-trap-bound");
      currentTrapHandler = null;
    }
  }
};

media.addEventListener("change", updateNavbar);
updateNavbar(media);

// Submenu
document.addEventListener("DOMContentLoaded", () => {
  const submenuToggles = document.querySelectorAll(".submenu-toggle");

  submenuToggles.forEach((button) => {
    const parentItem = button.closest(".has-submenu");
    if (!parentItem) return;

    const submenu = parentItem.querySelector(".submenu");
    if (!submenu) return;

    submenu.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && parentItem.classList.contains("open")) {
        closeSubmenu();
        button.focus();
      }
    });

    let hoverTimeout;

    const openSubmenu = () => {
      button.setAttribute("aria-expanded", "true");
      button.setAttribute("aria-pressed", "true");
      button.setAttribute("aria-label", "Submenu sluiten");
      parentItem.classList.add("open");
    };

    const closeSubmenu = () => {
      button.setAttribute("aria-expanded", "false");
      button.setAttribute("aria-pressed", "false");
      button.setAttribute("aria-label", "Submenu openen");
      parentItem.classList.remove("open");
    };

    button.addEventListener("click", (e) => {
      e.preventDefault();
      if (parentItem.classList.contains("open")) {
        closeSubmenu();
      } else {
        openSubmenu();
      }
    });

    let hoverOpenTimeout;
    let hoverCloseTimeout;

    const cancelClose = () => clearTimeout(hoverCloseTimeout);

    // Hover in
    parentItem.addEventListener("mouseenter", () => {
      clearTimeout(hoverCloseTimeout);
      hoverOpenTimeout = setTimeout(openSubmenu, 300);
    });

    parentItem.addEventListener("mouseleave", () => {
      clearTimeout(hoverOpenTimeout);
      hoverCloseTimeout = setTimeout(closeSubmenu, 300);
    });

    submenu.addEventListener("mouseenter", cancelClose);
    submenu.addEventListener("mouseleave", () => {
      hoverCloseTimeout = setTimeout(closeSubmenu, 300);
    });

    button.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        if (parentItem.classList.contains("open")) {
          closeSubmenu();
        } else {
          openSubmenu();
        }
      } else if (e.key === "Escape") {
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
  } else {
    backToTop.classList.remove("show");
  }
});

backToTop.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
  document.getElementById("top").focus();
});

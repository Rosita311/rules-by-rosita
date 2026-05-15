import { initMenu, openSidebar, closeSidebar } from "./modules/menu.js";
import { initDarkmode } from "./modules/darkmode.js";
import { initSearch, closeSearch } from "./modules/search.js";
import { initAccessibility, closePanel } from "./modules/accessibility.js";
import { initBackToTop } from "./modules/back-to-top.js";
import { initPrism } from "./modules/prism.js";

document.documentElement.classList.replace("no-js", "js");

// Expose for inline onclick handlers in header.php
window.openSidebar = openSidebar;
window.closeSidebar = closeSidebar;

initMenu();
initSearch();
initBackToTop();
initSubmenus();

document.body.addEventListener("keydown", () => {
  document.body.classList.add("user-is-tabbing");
});

document.body.addEventListener("mousedown", () => {
  document.body.classList.remove("user-is-tabbing");
});

document.addEventListener("click", (e) => {
  const searchOverlay = document.getElementById("search-overlay");
  const searchToggle = document.getElementById("search-toggle");
  const panel = document.getElementById("accessibility-settings");
  const toggleButton = document.getElementById("accessibility-toggle");

  if (
    searchOverlay?.classList.contains("show") &&
    !searchOverlay.contains(e.target) &&
    !searchToggle.contains(e.target)
  ) {
    closeSearch();
  }

  if (
    panel?.classList.contains("show") &&
    !panel.contains(e.target) &&
    !toggleButton?.contains(e.target)
  ) {
    closePanel();
  }
});

document.addEventListener("DOMContentLoaded", () => {
  initDarkmode();
  initAccessibility();
  initCommentForm();
  initPrism();
});

function initCommentForm() {
  const form = document.getElementById("commentform");
  if (!form) return;

  const author = document.getElementById("comment-author");
  const email = document.getElementById("comment-email");
  const comment = document.getElementById("comment");
  const checkbox = document.getElementById("comment-privacy");
  const errorBox = document.getElementById("privacy-error");

  form.addEventListener("submit", function (e) {
    let valid = true;
    let firstInvalid = null;

    document
      .querySelectorAll(".form__field-error")
      .forEach((el) => (el.style.display = "none"));
    if (errorBox) errorBox.style.display = "none";

    if (author && !author.value.trim()) {
      const error = document.getElementById("error-author");
      if (error) {
        error.textContent = "Vul je naam in.";
        error.style.display = "block";
      }
      if (!firstInvalid) firstInvalid = author;
      valid = false;
    }

    if (email && !email.value.trim()) {
      const error = document.getElementById("error-email");
      if (error) {
        error.textContent = "Vul je e-mailadres in.";
        error.style.display = "block";
      }
      if (!firstInvalid) firstInvalid = email;
      valid = false;
    } else if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
      const error = document.getElementById("error-email");
      if (error) {
        error.textContent = "Voer een geldig e-mailadres in.";
        error.style.display = "block";
      }
      if (!firstInvalid) firstInvalid = email;
      valid = false;
    }

    if (!comment?.value.trim()) {
      const error = document.getElementById("error-comment");
      if (error) {
        error.textContent = "Schrijf een reactie.";
        error.style.display = "block";
      }
      if (!firstInvalid) firstInvalid = comment;
      valid = false;
    }

    const isAdmin = form.dataset.isAdmin === "1";
    if (!isAdmin && checkbox && !checkbox.checked) {
      if (errorBox) {
        errorBox.textContent = errorBox.dataset.error || "Je moet akkoord gaan.";
        errorBox.style.display = "block";
      }
      if (!firstInvalid) firstInvalid = checkbox;
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
      setTimeout(() => {
        if (firstInvalid) firstInvalid.focus({ preventScroll: false });
      }, 0);
    }
  });
}

function initSubmenus() {
  const submenuToggles = document.querySelectorAll(".submenu-toggle");
  const media = window.matchMedia("(width < 1023px)");

  document.addEventListener("click", (e) => {
    document.querySelectorAll(".has-submenu.open").forEach((item) => {
      if (!item.contains(e.target)) {
        const toggle = item.querySelector(".submenu-toggle");
        const submenu = document.getElementById(toggle?.getAttribute("aria-controls"));
        item.classList.remove("open");
        toggle?.setAttribute("aria-expanded", "false");
        submenu?.setAttribute("aria-hidden", "true");
      }
    });
  });

  submenuToggles.forEach((button) => {
    const parentItem = button.closest(".has-submenu");
    const submenu = document.getElementById(button.getAttribute("aria-controls"));

    let hoverOpenTimeout, hoverCloseTimeout;

    const openSubmenu = () => {
      closeAllSubmenus();
      parentItem.classList.add("open");
      button.setAttribute("aria-expanded", "true");
      submenu?.setAttribute("aria-hidden", "false");
    };

    const closeSubmenu = () => {
      parentItem.classList.remove("open");
      button.setAttribute("aria-expanded", "false");
      submenu?.setAttribute("aria-hidden", "true");
      parentItem.dataset.openedByClick = "false";
    };

    const closeAllSubmenus = () => {
      document.querySelectorAll(".has-submenu.open").forEach((item) => {
        item.classList.remove("open");
        const toggle = item.querySelector(".submenu-toggle");
        const controlledId = toggle?.getAttribute("aria-controls");
        const submenuEl = controlledId ? document.getElementById(controlledId) : null;
        toggle?.setAttribute("aria-expanded", "false");
        submenuEl?.setAttribute("aria-hidden", "true");
        item.dataset.openedByClick = "false";
      });
    };

    button.addEventListener("click", (e) => {
      e.preventDefault();
      const isOpen = parentItem.classList.contains("open");
      if (isOpen) {
        closeSubmenu();
      } else {
        openSubmenu();
        parentItem.dataset.openedByClick = "true";
      }
    });

    parentItem.addEventListener("mouseenter", () => {
      if (!media.matches && parentItem.dataset.openedByClick !== "true") {
        clearTimeout(hoverCloseTimeout);
        hoverOpenTimeout = setTimeout(openSubmenu, 500);
      }
    });

    parentItem.addEventListener("mouseleave", () => {
      if (!media.matches && parentItem.dataset.openedByClick !== "true") {
        clearTimeout(hoverOpenTimeout);
        hoverCloseTimeout = setTimeout(closeSubmenu, 300);
      }
    });

    submenu?.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        closeSubmenu();
        button.focus();
      }
    });

    parentItem.addEventListener("focusout", (e) => {
      if (!parentItem.contains(e.relatedTarget) && !media.matches) {
        hoverCloseTimeout = setTimeout(closeSubmenu, 300);
      }
    });
  });
}

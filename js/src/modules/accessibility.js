import { activateTrap, deactivateTrap } from "./focus-trap.js";

const toggleButton = document.getElementById("accessibility-toggle");
const panel = document.getElementById("accessibility-settings");
const closeButton = document.getElementById("close-accessibility");

const accessibilityOptions = {
  "toggle-dyslexic": "dyslexic-font",
  "toggle-contrast": "high-contrast",
  "toggle-text": "large-text",
  "toggle-reduce-motion": "reduce-motion",
  "toggle-left-handed": "left-handed",
};

function updateThemeToggleVisibility() {
  const themeToggle = document.getElementById("theme-toggle");
  const isHighContrast = document.body.classList.contains("high-contrast");
  if (themeToggle) {
    themeToggle.style.display = isHighContrast ? "none" : "";
  }
}

function updateButtonIcon(button, state) {
  const iconOn = button.querySelector(".icon-on");
  const iconOff = button.querySelector(".icon-off");
  if (iconOn && iconOff) {
    iconOn.style.display = state ? "inline" : "none";
    iconOff.style.display = state ? "none" : "inline";
  }
}

function toggleSetting(button, className) {
  const isActive = button.getAttribute("aria-pressed") === "true";
  const newState = !isActive;
  button.setAttribute("aria-pressed", String(newState));
  const target = className === "large-text" ? document.documentElement : document.body;
  target.classList.toggle(className, newState);
  localStorage.setItem(className, newState);
  updateButtonIcon(button, newState);
  if (className === "high-contrast") {
    updateThemeToggleVisibility();
  }
}

export const togglePanel = () => {
  if (!panel || !toggleButton) return;
  const isVisible = panel.classList.toggle("show");
  panel.setAttribute("aria-hidden", String(!isVisible));
  toggleButton.setAttribute("aria-expanded", String(isVisible));

  if (isVisible) {
    const heading = panel.querySelector("#accessibility-heading");
    if (heading) setTimeout(() => heading.focus(), 150);
    activateTrap(panel);
  } else {
    deactivateTrap();
    toggleButton.focus();
  }
};

export const openPanel = () => {
  if (!panel || !toggleButton) return;
  panel.classList.add("show");
  panel.setAttribute("aria-hidden", "false");
  toggleButton.setAttribute("aria-expanded", "true");
  const heading = panel.querySelector("#accessibility-heading");
  if (heading) setTimeout(() => heading.focus(), 150);
  activateTrap(panel);
};

export const closePanel = () => {
  if (!panel || !toggleButton) return;
  deactivateTrap();
  panel.classList.remove("show");
  panel.setAttribute("aria-hidden", "true");
  toggleButton.setAttribute("aria-expanded", "false");
  toggleButton.focus();
};

function restoreSettings() {
  if (!document.getElementById("accessibility-settings")) {
    Object.values(accessibilityOptions).forEach((className) => {
      const target = className === "large-text" ? document.documentElement : document.body;
      target.classList.remove(className);
      if (className === "reduce-motion") {
        const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        target.classList.toggle(className, prefersReduced);
      } else {
        localStorage.removeItem(className);
      }
    });
    return;
  }

  Object.entries(accessibilityOptions).forEach(([buttonId, className]) => {
    const button = document.getElementById(buttonId);
    const savedState = localStorage.getItem(className) === "true";
    const target = className === "large-text" ? document.documentElement : document.body;
    target.classList.toggle(className, savedState);
    if (!button) return;
    button.setAttribute("aria-pressed", String(savedState));
    updateButtonIcon(button, savedState);
    button.addEventListener("click", () => toggleSetting(button, className));
  });

  updateThemeToggleVisibility();
}

function setupResetButton() {
  const resetBtn = document.getElementById("reset-accessibility");
  if (!resetBtn) return;

  resetBtn.addEventListener("click", () => {
    Object.entries(accessibilityOptions).forEach(([buttonId, className]) => {
      const button = document.getElementById(buttonId);
      const target = className === "large-text" ? document.documentElement : document.body;
      target.classList.remove(className);
      if (button) {
        button.setAttribute("aria-pressed", "false");
        updateButtonIcon(button, false);
      }
      localStorage.removeItem(className);
    });
    updateThemeToggleVisibility();
  });
}

export function initAccessibility() {
  restoreSettings();
  setupResetButton();

  if (!toggleButton || !panel || !closeButton) return;

  toggleButton.addEventListener("click", togglePanel);

  toggleButton.addEventListener("keydown", (e) => {
    if (e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      togglePanel();
    }
  });

  closeButton.addEventListener("click", closePanel);

  panel.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closePanel();
  });

  document
    .querySelector('a[href="#accessibility-settings"]')
    ?.addEventListener("click", (e) => {
      e.preventDefault();
      panel.classList.add("show");
      panel.setAttribute("aria-hidden", "false");
      const firstFocusable = panel.querySelector(
        'button, [tabindex]:not([tabindex="-1"])'
      );
      firstFocusable?.focus();
      activateTrap(panel);
    });
}

import { activateTrap, deactivateTrap } from "./focus-trap.js";

const searchOverlay = document.getElementById("search-overlay");
const searchToggle = document.getElementById("search-toggle");
const searchClose = document.getElementById("close-search");

function openSearch() {
  searchOverlay.classList.add("show");
  searchOverlay.removeAttribute("hidden");
  searchOverlay.removeAttribute("inert");
  searchOverlay.setAttribute("aria-hidden", "false");
  searchToggle.setAttribute("aria-expanded", "true");

  const firstInput = searchOverlay.querySelector(
    "input, button, [tabindex]:not([tabindex='-1'])"
  );
  firstInput?.focus();

  activateTrap(searchOverlay);
}

export function closeSearch() {
  document.activeElement.blur();
  searchOverlay.classList.remove("show");
  searchOverlay.setAttribute("hidden", "");
  searchOverlay.setAttribute("inert", "");
  searchOverlay.setAttribute("aria-hidden", "true");
  searchToggle.setAttribute("aria-expanded", "false");
  searchToggle.focus();
  deactivateTrap();
}

function toggleSearch() {
  const isOpen = searchOverlay.classList.contains("show");
  if (isOpen) {
    closeSearch();
  } else {
    openSearch();
  }
}

export function initSearch() {
  if (!searchOverlay || !searchToggle || !searchClose) return;

  searchToggle.addEventListener("click", (e) => {
    e.preventDefault();
    toggleSearch();
  });

  searchToggle.addEventListener("keydown", (e) => {
    if (e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      toggleSearch();
    }
  });

  searchClose.addEventListener("click", closeSearch);

  searchOverlay.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeSearch();
  });
}

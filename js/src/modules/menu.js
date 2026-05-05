import { activateTrap, deactivateTrap } from "./focus-trap.js";
import { closeSearch } from "./search.js";
import { closePanel, openPanel } from "./accessibility.js";

const openButton = document.getElementById("open-sidebar-button");
const navbar = document.getElementById("header-nav");
const overlay = document.getElementById("overlay");
const media = window.matchMedia("(width < 1023px)");
const mainContent = document.getElementById("main-content");
const menuButtons = document.querySelector(".site-header__buttons");
const footer = document.querySelector(".site-footer__container");
const navLinks = document.querySelectorAll("#header-nav a");
const toggleButton = document.getElementById("accessibility-toggle");
const backToTop = document.querySelector(".back-to-top");
const panel = document.getElementById("accessibility-settings");
const searchOverlay = document.getElementById("search-overlay");

let panelWasOpen = false;
let escKeyHandler = null;

export const openSidebar = () => {
  navbar.classList.add("show");
  document.body.classList.add("menu-open");
  openButton.setAttribute("aria-expanded", "true");
  if (searchOverlay?.classList.contains("show")) closeSearch();
  if (panel?.classList.contains("show")) closePanel();
  if (media.matches) {
    activateTrap(navbar);
    navbar.removeAttribute("inert");
    mainContent.setAttribute("inert", "");
    menuButtons.setAttribute("inert", "");
    footer.setAttribute("inert", "");
    overlay.style.display = "block";
    if (toggleButton) toggleButton.style.display = "none";
    if (backToTop) backToTop.style.display = "none";

    escKeyHandler = (e) => {
      if (e.key === "Escape") closeSidebar();
    };
    document.addEventListener("keydown", escKeyHandler);
  }
};

export const closeSidebar = () => {
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
    if (backToTop) backToTop.style.display = "block";
  }
  if (!media.matches && panel && panelWasOpen) {
    openPanel();
    panelWasOpen = false;
  }
  openButton?.focus();
};

export function initMenu() {
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
        if (toggleButton) toggleButton.style.display = "none";
        if (backToTop) backToTop.style.display = "none";
        if (panel && panel.classList.contains("show")) {
          panelWasOpen = true;
          closePanel();
        }
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
      if (toggleButton) toggleButton.style.display = "block";
      if (backToTop) backToTop.style.display = "block";
      if (panel && panelWasOpen) {
        panelWasOpen = false;
        openPanel();
      }
    }
  };

  media.addEventListener("change", updateNavbar);
  updateNavbar(media);
}

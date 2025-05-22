/*
const openButton = document.getElementById('open-sidebar-button');
const navbar = document.getElementById("header-nav");
const overlay = document.getElementById("overlay");
const media = window.matchMedia("(width < 1023px)");
const mainContent = document.getElementById("main-content");
const menuButtons = document.querySelector(".menu-buttons");
const footer = document.querySelector(".footer-container");
const navLinks = document.querySelectorAll('#header-nav a');

let currentTrapHandler = null;
let escKeyHandler = null;

const trapFocus = (container) => {
  const focusableSelectors = 'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])';
  const focusableEls = container.querySelectorAll(focusableSelectors);
  console.log("Focusables in menu:", focusableEls);

  const firstEl = focusableEls[0];
  const lastEl = focusableEls[focusableEls.length - 1];

  const handleTrap = (e) => {
    if (e.key === 'Tab') {
      if (e.shiftKey && document.activeElement === firstEl) {
        e.preventDefault();
        lastEl.focus();
      } else if (!e.shiftKey && document.activeElement === lastEl) {
        e.preventDefault();
        firstEl.focus();
      }
    }
  };

  container.addEventListener('keydown', handleTrap);
  container.setAttribute('data-trap-bound', 'true');
  return handleTrap;
};

const openSidebar = () => {
  navbar.classList.add("show");
  document.body.classList.add('menu-open');
  openButton.setAttribute('aria-expanded', 'true');

  if (media.matches) {
    console.log("trapFocus wordt aangeroepen:", media.matches);

    currentTrapHandler = trapFocus(navbar);
    navbar.removeAttribute('inert');
    mainContent.setAttribute('inert', '');
    menuButtons.setAttribute('inert', '');
    footer.setAttribute('inert', '');
    overlay.style.display = "block";
  }

  escKeyHandler = (e) => {
    if (e.key === 'Escape') closeSidebar();
  };
  document.addEventListener('keydown', escKeyHandler);
};

console.log("Trap active, key:", e.key, "Active element:", document.activeElement);


const closeSidebar = () => {
  navbar.classList.remove("show");
  document.body.classList.remove('menu-open');
  openButton.setAttribute('aria-expanded', 'false');

  if (media.matches) {
    navbar.setAttribute('inert', '');
    mainContent.removeAttribute('inert');
    menuButtons.removeAttribute('inert');
    footer.removeAttribute('inert');
    overlay.style.display = "none";
  }

  if (currentTrapHandler) {
    navbar.removeEventListener('keydown', currentTrapHandler);
    navbar.removeAttribute('data-trap-bound');
    currentTrapHandler = null;
  }

  if (escKeyHandler) {
    document.removeEventListener('keydown', escKeyHandler);
    escKeyHandler = null;
  }

  openButton.focus();
};

navLinks.forEach(link => {
  link.removeAttribute('aria-current');
  if (link.href === window.location.href) {
    link.setAttribute('aria-current', 'page');
  }
  link.addEventListener('click', closeSidebar);
});

const updateNavbar = (e) => {
  const isMobile = e.matches;
  if (isMobile) {
    navbar.setAttribute('inert', '');
  } else {
    navbar.removeAttribute('inert');
    navbar.classList.remove("show");
    overlay.style.display = "none";
    openButton.setAttribute('aria-expanded', 'false');

    if (currentTrapHandler) {
      navbar.removeEventListener('keydown', currentTrapHandler);
      navbar.removeAttribute('data-trap-bound');
      currentTrapHandler = null;
    }
  }
};

media.addEventListener('change', updateNavbar);
updateNavbar(media);

// ✅ Submenu met jouw inert-aanpak
document.addEventListener('DOMContentLoaded', () => {
  const submenuToggles = document.querySelectorAll('.submenu-toggle');

  submenuToggles.forEach(button => {
    const parentItem = button.closest('.has-submenu');
    if (!parentItem) return;
    const submenu = parentItem.querySelector('.submenu');
    if (!submenu) return;

    let hoverTimeout;

    const openSubmenu = () => {
      button.setAttribute('aria-expanded', 'true');
      button.setAttribute('aria-pressed', 'true');
      button.setAttribute('aria-label', 'Submenu sluiten');
      parentItem.classList.add('open');

      // Trap opnieuw activeren bij submenu op mobiel
      if (media.matches && navbar.classList.contains('show')) {
        if (currentTrapHandler) {
          navbar.removeEventListener('keydown', currentTrapHandler);
          navbar.removeAttribute('data-trap-bound');
        }

        requestAnimationFrame(() => {
          currentTrapHandler = trapFocus(navbar);
        });
      }
    };

    const closeSubmenu = () => {
      button.setAttribute('aria-expanded', 'false');
      button.setAttribute('aria-pressed', 'false');
      button.setAttribute('aria-label', 'Submenu openen');
      parentItem.classList.remove('open');
    };

    button.addEventListener('click', (e) => {
      e.preventDefault();
      if (parentItem.classList.contains('open')) {
        closeSubmenu();
      } else {
        openSubmenu();
      }
    });

    parentItem.addEventListener('mouseenter', () => {
      clearTimeout(hoverTimeout);
      hoverTimeout = setTimeout(openSubmenu, 500);
    });

    parentItem.addEventListener('mouseleave', () => {
      clearTimeout(hoverTimeout);
      hoverTimeout = setTimeout(closeSubmenu, 500);
    });

    button.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        if (parentItem.classList.contains('open')) {
          closeSubmenu();
        } else {
          openSubmenu();
        }
      } else if (e.key === 'Escape') {
        closeSubmenu();
        button.focus();
      }
    });
  });
});

*/

// Fallback for Javascript disabled
document.documentElement.classList.replace('no-js','js');

// Menu
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
    const firstEl = focusableEls[0];
    const lastEl = focusableEls[focusableEls.length - 1];

    const handleTrap = (e) => {
        if (e.key === 'Tab') {
            if(e.shiftKey && document.activeElement === firstEl) {
                e.preventDefault();
                lastEl.focus();
            } else if (!e.shiftKey && document.activeElement === lastEl) {
                e.preventDefault();
                firstEl.focus();
            }
        }
    }
    container.addEventListener('keydown', handleTrap);
    container.setAttribute('data-trap-bound', 'true');

    return handleTrap;
  };

  const openSidebar = () => {
    navbar.classList.add("show");
    document.body.classList.add('menu-open');
    openButton.setAttribute('aria-expanded', 'true');
    
    if (media.matches) {
        currentTrapHandler = trapFocus(navbar);
        navbar.removeAttribute('inert');
        mainContent.setAttribute('inert', '');
        menuButtons.setAttribute('inert', '');
        footer.setAttribute('inert', '');
        overlay.style.display = "block";
    }

    escKeyHandler = (e) => {
        if (e.key === 'Escape') {
            closeSidebar();
        }
    };
    document.addEventListener('keydown', escKeyHandler);
};

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
    openButton.focus();
    
    if (currentTrapHandler) {
        navbar.removeEventListener('keydown', currentTrapHandler);
        navbar.removeAttribute('data-trap-bound');
        currentTrapHandler = null;
    }

    if (escKeyHandler) {
        document.removeEventListener('keydown', escKeyHandler);
        escKeyHandler = null;
    }    
};

navLinks.forEach(link => {
    link.addEventListener('click', closeSidebar);
    link.removeAttribute('aria-current');

    if (link.href === window.location.href) {
        link.setAttribute('aria-current', 'page');
    }
});

const updateNavbar = (e) => {
    const isMobile = e.matches;
    console.log("Screen changed. Mobile view:", isMobile)
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

// Submenu
document.addEventListener('DOMContentLoaded', () => {
    const submenuToggles = document.querySelectorAll('.submenu-toggle');

    submenuToggles.forEach(button => {
        const parentItem = button.closest('.has-submenu');
        if (!parentItem) return; // Skip als structuur niet klopt

        const submenu = parentItem.querySelector('.submenu');
        if (!submenu) return; // Skip als submenu niet bestaat

        let hoverTimeout;

        const openSubmenu = () => {
            button.setAttribute('aria-expanded', 'true');
            button.setAttribute('aria-pressed', 'true');
            button.setAttribute('aria-label', 'Submenu sluiten');
            parentItem.classList.add('open');
        };

        const closeSubmenu = () => {
            button.setAttribute('aria-expanded', 'false');
            button.setAttribute('aria-pressed', 'false');
            button.setAttribute('aria-label', 'Submenu openen');
            parentItem.classList.remove('open');
        };

        // Klik
        button.addEventListener('click', (e) => {
            e.preventDefault();
            if (parentItem.classList.contains('open')) {
                closeSubmenu();
            } else {
                openSubmenu();
            }
        });

        // Hover
        parentItem.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            hoverTimeout = setTimeout(openSubmenu, 300);
        });

        parentItem.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimeout);
            hoverTimeout = setTimeout(closeSubmenu, 300);
        });

        // Keyboard
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
       

// Darkmode

document.addEventListener('DOMContentLoaded', () => {
    const themeSwitch = document.getElementById('theme-switch');
    let darkmode = localStorage.getItem('darkmode');
    const root = document.documentElement; 

    const enableDarkmode = () => {
        root.classList.add('darkmode');
        root.style.colorScheme = 'dark';
        localStorage.setItem('darkmode', 'active');
        themeSwitch.setAttribute('aria-label', 'Donker thema uitschakelen');
        themeSwitch.setAttribute('aria-pressed', 'true');
        };

    const disableDarkmode = () => {
        root.classList.remove('darkmode');
        root.style.colorScheme = 'light';
        localStorage.setItem('darkmode', 'inactive' );
        themeSwitch.setAttribute('aria-label', 'Donker thema inschakelen');
        themeSwitch.setAttribute('aria-pressed', 'false');
        };

    if(darkmode === 'active') {
        enableDarkmode();
     } else if (darkmode === 'inactive') {
          disableDarkmode();
        } else {
            if(window.matchMedia('(prefers-color-scheme: dark)').matches) {
                enableDarkmode();
            } else {
                disableDarkmode();
    }
}

if(!darkmode) {
    if(window.matchMedia('(prefers-color-scheme: dark)').matches) {
        darkmode = 'active';
    } else {
        darkmode = 'inactive';
    }
}

 themeSwitch.addEventListener('click', () => {
            darkmode = localStorage.getItem('darkmode');
            if (darkmode !== 'active') {
                enableDarkmode();
            } else {
                disableDarkmode();
            }
        })
    }
);

// Keyboard navigation
document.body.addEventListener('keydown', () => {
   document.body.classList.add('user-is-tabbing');
 });
  
document.body.addEventListener('mousedown', () => {
   document.body.classList.remove('user-is-tabbing');
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
document.getElementById('top').focus();
});


// Menu
const openButton = document.getElementById('open-sidebar-button');
const navbar = document.getElementById("header-nav");
const overlay = document.getElementById("overlay");
const media = window.matchMedia("(width < 1023px)");
const mainContent = document.getElementById("main-content");
const menuButtons = document.querySelector(".menu-buttons");
const footer = document.querySelector(".footer-container");

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
    }
};

media.addEventListener('change', updateNavbar);

const openSidebar = () => {
    navbar.classList.add("show");
    openButton.setAttribute('aria-expanded', 'true');
    navbar.removeAttribute('inert');
    mainContent.setAttribute('inert', '');
    menuButtons.setAttribute('inert', '');
    footer.setAttribute('inert', '');
    overlay.style.display = "block";
};

const closeSidebar = () => {
    navbar.classList.remove("show");
    openButton.setAttribute('aria-expanded', 'false');
    if (media.matches) {
        navbar.setAttribute('inert', '');
        mainContent.removeAttribute('inert');
        menuButtons.removeAttribute('inert');
        footer.removeAttribute('inert');
    }
    overlay.style.display = "none";
};

const navLinks = document.querySelectorAll('#header-nav a');
navLinks.forEach(link => {
    link.addEventListener('click', closeSidebar);
});

updateNavbar(media);

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
  
// Menu
const openButton = document.getElementById('open-sidebar-button');
const navbar = document.getElementById("navbar");

const media = window.matchMedia("(width < 900px)");

const updateNavbar = (e) => {
    const isMobile = e.matches;
    console.log('isMobile:', isMobile);
    if (isMobile) {
        navbar.setAttribute('inert', '');
    } else {
        navbar.removeAttribute('inert');
    }
};

if (media.addEventListener) {
    media.addEventListener('change', updateNavbar);
} else {
    media.addListener(updateNavbar); 
}

const openSidebar = () => {
    navbar.classList.add("show");
    openButton.setAttribute('aria-expanded', 'true');
    navbar.removeAttribute('inert');
};

const closeSidebar = () => {
    navbar.classList.remove("show");
    openButton.setAttribute('aria-expanded', 'false');
    navbar.setAttribute('inert', '');
};


const navLinks = document.querySelectorAll('nav a');
navLinks.forEach(link => {
    link.addEventListener('click', closeSidebar);
});

updateNavbar(media);

// Darkmode

let darkmode = localStorage.getItem('darkmode');
const themeSwitchButtons = document.querySelectorAll('.theme-switch');

const enableDarkmode = () => {
    console.log('Darkmode is ingeschakeld');
    document.body.classList.add('darkmode');
    localStorage.setItem('darkmode', 'active');
    themeSwitchButtons.forEach(button => {
        button.setAttribute('aria-label', 'Schakel over naar licht thema');
    });
}

const disableDarkmode = () => {
    console.log('Darkmode is uitgeschakeld');
    document.body.classList.remove('darkmode');
    localStorage.setItem('darkmode', 'inactive');
    themeSwitchButtons.forEach(button => {
        button.setAttribute('aria-label', 'Schakel over naar donker thema');
    });
}

if(darkmode === 'active') {
    enableDarkmode();
} else {
    disableDarkmode();
}

themeSwitchButtons.forEach(button => {
    button.addEventListener('click', () => {
        console.log("Darkmode knop is ingedrukt!");
        darkmode = localStorage.getItem('darkmode');
        console.log('Current darkmode state:', darkmode);
        if (darkmode !== 'active') {
            enableDarkmode();
        } else {
            disableDarkmode();
        }
    });
});
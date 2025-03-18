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

document.addEventListener('DOMContentLoaded', () => {
    const themeSwitchButtons = document.querySelectorAll('.theme-switch');
    let darkmode = localStorage.getItem('darkmode');
    const root = document.documentElement; 

    const enableDarkmode = () => {
        root.classList.add('darkmode');
        root.style.colorScheme = 'dark';
        localStorage.setItem('darkmode', 'active');
        themeSwitchButtons.forEach(button => {
            button.setAttribute('aria-label', 'Schakel over naar licht thema');
            button.setAttribute('aria-pressed', 'true');
        });
    }

    const disableDarkmode = () => {
        root.classList.remove('darkmode');
        root.style.colorScheme = 'light';
        localStorage.setItem('darkmode', 'inactive' );
        themeSwitchButtons.forEach(button => {
            button.setAttribute('aria-label', 'Schakel over naar donker thema');
            button.setAttribute('aria-pressed', 'false');
        });
    }

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

    themeSwitchButtons.forEach(button => {
        button.addEventListener('click', () => {
            darkmode = localStorage.getItem('darkmode');
            if (darkmode !== 'active') {
                enableDarkmode();
            } else {
                disableDarkmode();
            }
        });
    })

});
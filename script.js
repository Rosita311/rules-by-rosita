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
    console.log("Darkmode knoppen gevonden:", themeSwitchButtons.length);

    let darkmode = localStorage.getItem('darkmode');
    console.log('Current darkmode state:', darkmode);

    const enableDarkmode = () => {
        console.log('Darkmode is AAN');
        document.body.classList.add('darkmode');
        localStorage.setItem('darkmode', 'active');
        themeSwitchButtons.forEach(button => {
            button.setAttribute('aria-label', 'Schakel over naar licht thema');
        });

        document.body.style.display = "none";
        document.body.offsetHeight; // Trigger reflow
        document.body.style.display = "";
    }

    const disableDarkmode = () => {
        console.log('Darkmode is UIT');
        document.body.classList.remove('darkmode');
        localStorage.setItem('darkmode', 'inactive' );
        themeSwitchButtons.forEach(button => {
            button.setAttribute('aria-label', 'Schakel over naar donker thema');
        });

        document.body.style.display = "none";
        document.body.offsetHeight; 
        document.body.style.display = "";
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
    })

});
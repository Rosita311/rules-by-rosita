const openButton = document.getElementById('open-sidebar-button');
const navbar = document.getElementById("navbar");

const media = window.matchMedia("(width < 900px)");

const updateNavbar = (e) => {
    const isMobile = e.matches;
    console.log(isMobile);
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

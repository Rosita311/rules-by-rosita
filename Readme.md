# Rules by Rosita Theme

[Nederlands](#nederlands) • [English](#english)

## Nederlands

## Inleiding

Het **Rules by Rosita Theme** is een op maat gemaakt WordPress-thema dat ik ontwikkel als leerproject. Het doel van dit project is om mijn vaardigheden als developer te verbeteren door een volledig functioneel en toegankelijk thema te bouwen met moderne technieken. Het thema is ontworpen om een eenvoudige, responsieve en toegankelijke ervaring te bieden voor mijn persoonlijke blog, en is openbaar beschikbaar op GitHub voor toekomstige uitbreidingen of als leerbron.

Het thema wordt ontwikkeld in **HTML**, **CSS**, **PHP** en **JavaScript**, met aandacht voor **responsiviteit**, **toegankelijkheid** en **gebruiksvriendelijkheid**.

---

## Ontwikkelproces

1. **Statische mock-up**: Bouwen van een werkende statische versie in HTML, CSS en JavaScript.
2. **Template parts**: Opsplitsen van componenten in herbruikbare template parts binnen WordPress.
3. **PHP-integratie**: Samenvoegen van onderdelen tot een functioneel WordPress-thema.
4. **Toegankelijkheid**: Gericht op gebruiksvriendelijkheid en bruikbaarheid voor zoveel mogelijk mensen.
5. **Testen en debuggen**: Test en debug het thema voordat het live gaat.

---

## Features

- **Responsief design**: Werkt goed op mobiel, tablet en desktop.
- **Toegankelijkheid**: Ondersteuning voor schermlezers zoals NVDA.
- **Dark Mode**: Via CSS custom properties, `prefers-color-scheme` en een handmatige toggle met `localStorage`.
- **Zoekfunctie**: Eenvoudige toegang tot content.
- **Semantische HTML en ARIA**: Voor betere structuur en toegankelijkheid.
- **Logische tabvolgorde**: Navigatie met toetsenbord in verwachte en consistente volgorde.

---

## Design

Een minimalistische en heldere stijl, afgestemd op leesbaarheid en eenvoud.

### Kleurenpalet

**Licht thema:**

- Tekst: `#192324`
- Primair: `#D7233E`
- Accent 1: `#F8C9D7`
- Accent 2: `#EBEBEB`
- Footer: `#CBEEF3`
- Contrastkleur: `#49B3C1`
- Achtergrond: `#F8F4F5`
- Menu-knop hover: `#F8C9D7`
- Button hover: `#E38CA6`
- Button tekst: `#F8F4F5`
- Hero achtergrond: `#F8C9D7`

**Donker thema:**

- Tekst: `rgba(255, 255, 255, 0.87)`
- Primair: `DD3F60`
- Accent 1: `#E38CA6`
- Accent 2: `#293A3D`
- Footer: `#103C42`
- Contrastkleur: `#45A4B0`
- Achtergrond: `#192324`
- Card achtergrond: `#293A3D`
- Menu-knop hover: `#293A3D`
- Button hover: `#E38CA6`
- Button tekst: `#192324`
- Hero achtergrond: `#103C42`

### Typografie

- **Bodytekst**: `Nunito, sans-serif`
- **Koppen**: `Zilla Slab, serif`

---

## Toegankelijkheid

- **Skiplink** voor snelle toegang tot hoofdinhoud.
- **Dark mode** met systeemvoorkeur en handmatige schakelaar via `localStorage`.
- **Semantische HTML** en **ARIA-rollen** voor betere schermlezerondersteuning.
- **Tabvolgorde** die aansluit op visuele en functionele logica van de interface.
- **Toegankelijkheidsinstellingen menu** met opties voor Leesbaar font, Hoog contrast, grotere teksten en animaties uitschakelen

---

## Ontwikkelstatus

- Zie de [Devlog](#devlog) voor een gedetailleerd overzicht van afgeronde onderdelen en geplande taken.

---

## Ideeën voor de toekomst

- Thema omzetten naar block theme met `theme.json`
- Sociale media iconen widget converteren naar blockwidget.
- Custom post type maken voor gelezen boeken
- Site-kleuren via Customizer (primary, accent, background, text).
- Typografie via Customizer (basis en kopteksten).
- Mogelijkheid om extra scripts toe te voegen in `<head>` (Analytics).

---

## Gebruikte tools & technologieën

- WordPress
- HTML, CSS, JavaScript (ES6+), PHP
- Git & GitHub
- VS Code + GitHub Copilot
- LocalWP
- Google Fonts (Nunito & Zilla Slab)
- Tabler Icons
- CSS Flexbox & Grid

---

## Plugins

- Yoast
- Advanced Custom Fields
- Antispam Bee
- Imsanity
- Forminator
- Complianz
- Limit Login Attempts Reloaded
- Public Post Preview
- Themecheck
- Site Kit by Google
- WP Accessibility
- Accessibility Checker
- Jetpack

---

## Bronnen

- **MDN Web Docs** – Referentie voor HTML, CSS en JavaScript  
  [https://developer.mozilla.org](https://developer.mozilla.org)

- **WordPress Developer Handbook** – Documentatie voor themabouw en WP-functies  
  [https://developer.wordpress.org/themes/](https://developer.wordpress.org/themes/)

- **A Modern CSS Reset** – Door Josh W. Comeau, als basis voor consistente styling  
  [https://www.joshwcomeau.com/css/custom-css-reset/](https://www.joshwcomeau.com/css/custom-css-reset/)

- **A11Y Project** – Richtlijnen en tips voor toegankelijkheid  
  [https://www.a11yproject.com](https://www.a11yproject.com)

- **Accessible Card Patterns** – Uitleg over toegankelijke kaarten door Heydon Pickering  
  [https://inclusive-components.design/cards/](https://inclusive-components.design/cards/)

- **Tabler Icons** – Voor lichtgewicht SVG-iconen  
  [https://tabler.io/icons](https://tabler.io/icons)

- **Google Fonts** – Voor typografie (`Nunito` & `Zilla Slab`)  
  [https://fonts.google.com](https://fonts.google.com)

- **Forminator Documentation** – Plugin documentatie 
  [https://wpmudev.com/docs/wpmu-dev-plugins/forminator/](https://wpmudev.com/docs/wpmu-dev-plugins/forminator/)

- **Complianz Documentation** – Plugin documentatie
  [https://complianz.io/support/#documentation](https://complianz.io/support/#documentation)

---

## Licentie

Dit project valt onder de **MIT License**.

> Het project is openbaar beschikbaar, maar primair bedoeld voor mijn eigen blog. Het wordt gedeeld als leerproject en ter documentatie – niet als kant-en-klaar commercieel product.

---

## Bijdragen

Pull requests en suggesties zijn welkom, maar houd er rekening mee dat dit een persoonlijk project is. Bekijk gerust de code en gebruik wat je leert.

---

## Devlog

### Afgerond

- Hero met CSS-stippenpatroon afgerond
- Dark mode automatisch op systeemvoorkeur ingesteld
- Dark mode toggle met `localStorage` toegevoegd
- Primair rood kleurenschema afgestemd tussen light en dark mode
- `rem` en `em` gebruikt voor schaalbaarheid
- Skiplink toegevoegd voor schermlezers en toetsenbordgebruikers
- Toegankelijke focusstijl voor interactieve elementen in kaart gebracht
- Secondary button in dark mode verbeterd (contrast)
- Footer bewerkt, inclusief link naar privacyverklaring
- Toegankelijke animatie toegevoegd met `prefers-reduced-motion` ondersteuning
- GitHub Pages demo opgezet: [rulesbyrosita-theme](https://rosita311.github.io/RulesbyRosita-theme/)
- Basis design afgerond
- Pagina-structuur opgezet (hero, cards, typografie, kleuren)
- Submenu toegevoegd aan hoofdmenu (met aandacht voor toetsenbordnavigatie en aria-attributen)
- Basic zoekpagina toegevoegd
- `page.html` als structuurtemplate voor o.a. 404-pagina’s en andere pagina’s
- **Back to top-knop ontworpen, geïmplementeerd en getest** (toegankelijk, mobielvriendelijk, met animatie en voorkeuren voor `reduced motion`)
- Toegankelijkheidstest: WAVE & Lighthouse
- Consistente focusstijl (light & dark mode)
- Zoekfunctie geïntegreerd in WordPress
- Favicon aangepast 
- Logo geoptimaliseerd
- WordPress PHP-integratie afgerond (loop, dynamische content, template parts) 
- Instellingenmenu voltooid (incl. dark mode toggle)
- Correcte headingstructuur (H1 t/m H6 hiërarchie)
- Semantische HTML + ARIA-implementatie
- Animaties met prefers-reduced-motion
- Submenu met toetsenbordnavigatie + ARIA
- Dupliceer post/pagina functie
- Widgetgebied in footer voor Jetpack abonnementen widget en social media iconen widget.
- Custom widget voor social media iconen.

### Nog te doen

- robots.txt en sitemap.xml bij publicatie (Yoast kan dit deels regelen)
- Toegankelijkheid testen met tools als WAVE (gebeurt tijdens het hele proces)
- Browsercompatibiliteit checken (Chrome, Firefox, Safari, Edge).
- Veiligheid: wp-config en bestandstoegang goed ingesteld?
- Backup maken van het thema en de database.

### SEO-taken

- Voeg `robots.txt` en eventueel een sitemap.xml toe bij live publicatie (Yoast maakt meestal een virtuele, maar check)
- Zorg dat paginatitels en URLs duidelijk zijn (permalinks in WordPress) (SEO-vriendelijk: /post-name/)
- Controleer performance en SEO via tools zoals Lighthouse of PageSpeed Insights
- Sitemap.xml beschikbaar (Yoast regelt dit, test via /sitemap_index.xml).

> De footer fluistert iets… maar alleen als je goed kijkt 👀

## Changelog

---

## English

## Introduction

The **Rules by Rosita Theme** is a custom WordPress theme I’m developing as a learning project. The goal of this project is to improve my skills as a developer by building a fully functional and accessible theme using modern techniques. It’s designed to provide a simple, responsive, and accessible experience for my personal blog, and is publicly available on GitHub for learning or future expansion.

The theme is being developed in **HTML**, **CSS**, **PHP**, and **JavaScript**, with a strong focus on **responsiveness**, **accessibility**, and **usability**.

---

## Development Process

1. **Static mock-up**: Build a working static version using HTML, CSS, and JavaScript.
2. **Template parts**: Break components into reusable template parts within WordPress.
3. **PHP integration**: Combine the parts into a functional WordPress theme.
4. **Accessibility**: Ensure usability for as many people as possible.
5. **Testing and debugging**: Test and debug theme before live.

---

## Features

- **Responsive design**: Works well on mobile, tablet, and desktop.
- **Accessibility**: Supports screen readers like NVDA.
- **Dark Mode**: Controlled via CSS custom properties, `prefers-color-scheme`, and a manual toggle using `localStorage`.
- **Search function**: Easy access to content.
- **Semantic HTML and ARIA**: For better structure and screen reader support.
- **Logical tab order**: Consistent and expected keyboard navigation.

---

## Design

A minimalist and clean style focused on readability and simplicity.

### Color Palette

**Light theme:**

- Text: `#192324`
- Primary: `#D7233E`
- Accent 1: `#F8C9D7`
- Accent 2: `#EBEBEB`
- Footer: `#CBEEF3`
- Contrast color: `#49B3C1`
- Background: `#F8F4F5`
- Menu button hover: `#F8C9D7`
- Button hover: `#E38CA6`
- Button text: `#F8F4F5`
- Hero background: `#F8C9D7`

**Dark theme:**

- Text: `rgba(255, 255, 255, 0.87)`
- Primary: `#DD3F60`
- Accent 1: `#E38CA6`
- Accent 2: `#293A3D`
- Footer: `#103C42`
- Contrast color: `#45A4B0`
- Background: `#192324`
- Card background: `#293A3D`
- Menu button hover: `#293A3D`
- Button hover: `#E38CA6`
- Button text: `#192324`
- Hero background: `#103C42`

### Typography

- **Body text**: `Nunito, sans-serif`
- **Headings**: `Zilla Slab, serif`

---

## Accessibility

- **Skip link** for quick access to main content.
- **Dark mode** based on system preference with a manual toggle via `localStorage`.
- **Semantic HTML** and **ARIA roles** for improved screen reader support.
- **Tab order** that aligns with the visual and functional structure of the interface.

---

## Development Status

See the [Devlog](#devlog) for a detailed overview of completed features and upcoming tasks.

---

## Future Ideas

- Convert theme to block theme using `theme.json`
- Convert social media icon widgets to block widgets.
- Create custom post types for books read.
- Site colors via the Customizer (primary, accent, background, text).
- Typography via the Customizer (basic and headers).
- Ability to add additional scripts in `<head>` (Analytics).

---

## Tools & Technologies Used

- WordPress
- HTML, CSS, JavaScript (ES6+), PHP
- Git & GitHub
- VS Code + GitHub Copilot
- LocalWP
- Google Fonts (Nunito & Zilla Slab)
- Tabler Icons
- CSS Flexbox & Grid

---

## Plugins

- Yoast
- Advanced Custom Fields
- Antispam Bee
- Imsanity
- Forminator
- Complianz
- Limit Login Attempts Reloaded
- Public Post Preview
- Themecheck
- Site Kit by Google
- WP Accessibility
- Accessibility Checker
- Jetpack

---

## Resources

- **MDN Web Docs** – Reference for HTML, CSS, and JavaScript  
  [https://developer.mozilla.org](https://developer.mozilla.org)

- **WordPress Developer Handbook** – Documentation for theme building and WP functions  
  [https://developer.wordpress.org/themes/](https://developer.wordpress.org/themes/)

- **A Modern CSS Reset** – By Josh W. Comeau, used for consistent styling  
  [https://www.joshwcomeau.com/css/custom-css-reset/](https://www.joshwcomeau.com/css/custom-css-reset/)

- **A11Y Project** – Guidelines and tips on accessibility  
  [https://www.a11yproject.com](https://www.a11yproject.com)

- **Accessible Card Patterns** – Explained by Heydon Pickering  
  [https://inclusive-components.design/cards/](https://inclusive-components.design/cards/)

- **Tabler Icons** – Lightweight SVG icons  
  [https://tabler.io/icons](https://tabler.io/icons)

- **Google Fonts** – Typography (`Nunito` & `Zilla Slab`)  
  [https://fonts.google.com](https://fonts.google.com)

  **Forminator Documentation** – plugin documentation 
  [https://wpmudev.com/docs/wpmu-dev-plugins/forminator/](https://wpmudev.com/docs/wpmu-dev-plugins/forminator/)

- **Complianz Documentation** – Plugin documentation
  [https://complianz.io/support/#documentation](https://complianz.io/support/#documentation)

---

## License

This project is licensed under the **MIT License**.

> The project is publicly available, but primarily intended for my personal blog. It’s shared as a learning resource and documentation — not as a ready-made commercial product.

---

## Contributing

Pull requests and suggestions are welcome, but keep in mind this is a personal project. Feel free to explore the code and use what you learn.

---

## Devlog

### Completed

- Hero with CSS dot pattern finalized
- Dark mode automatically set to system preference
- Dark mode toggle with `localStorage` added
- Primary red color scheme aligned between light and dark mode
- `rem` and `em` used for scalability
- Skiplink added for screen readers and keyboard users
- Accessible focus style for interactive elements mapped
- Secondary button in dark mode improved (contrast)
- Footer edited, including link to privacy statement
- Accessible animation added with `prefers-reduced-motion` support
- GitHub Pages demo created: [rulesbyrosita-theme](https://rosita311.github.io/RulesbyRosita-theme/)
- Basic design finalized
- Page structure established (hero, cards, typography, colors)
- Submenu added to main menu (with attention to keyboard navigation and aria attributes)
- Basic search page added
- `page.html` as structure template For 404 pages and other pages, among others.
- Designed, implemented, and tested Back to top button (accessible, mobile-friendly, with animation and reduced motion preferences)
- Accessibility testing: WAVE & Lighthouse
- Consistent focus style (light & dark mode)
- Search function integrated into WordPress
- Adjusted favicon
- Optimized logo
- Completed WordPress PHP integration (loop, dynamic content, template parts)
- Completed settings menu (including dark mode toggle)
- Correct heading structure (H1 to H6 hierarchy)
- Semantic HTML + ARIA implementation
- Animations with reduced-motion preferences
- Submenu with keyboard navigation + ARIA
- Duplicate post/page function
- Footer widget area for Jetpack subscription widget and social media icon widget.
- Custom widget for social media icons.

### To Do

- Edit robots.txt and sitemap.xml upon publication (Yoast can partially handle this)
- Test accessibility with tools like WAVE (this is done throughout the entire process)
- Check browser compatibility (Chrome, Firefox, Safari, Edge)
- Security: Are wp-config and file permissions configured correctly?
- Back up the theme and database.

### SEO Tasks

- Add `robots.txt` and, if necessary, a sitemap.xml when publishing live (Yoast usually creates a virtual one, but check).
- Ensure page titles and URLs are clear (permalinks in WordPress) (SEO-friendly: /post-name/).
- Check performance and SEO using tools like Lighthouse or PageSpeed Insights.
- Sitemap.xml available (Yoast handles this; test via /sitemap_index.xml).

> The footer whispers… but only if you look closely 👀

## Changelog

# Rules by Rosita Theme

## Inleiding

Het **Rules by Rosita Theme** is een op maat gemaakt WordPress-thema dat ik ontwikkel als leerproject. Het doel van dit project is om mijn vaardigheden als developer te verbeteren door een volledig functioneel en toegankelijk thema te bouwen met moderne technieken. Het thema is ontworpen om een eenvoudige, responsieve en toegankelijke ervaring te bieden voor mijn persoonlijke blog, en is openbaar beschikbaar op GitHub voor toekomstige uitbreidingen of als leerbron.

Het thema wordt ontwikkeld in **HTML**, **CSS**, **PHP** en **JavaScript**, met aandacht voor **responsiviteit**, **toegankelijkheid** en **gebruiksvriendelijkheid**.

---

## Ontwikkelproces

1. **Statische mock-up**: Bouwen van een werkende statische versie in HTML, CSS en JavaScript.
2. **Template parts**: Opsplitsen van componenten in herbruikbare template parts binnen WordPress.
3. **PHP-integratie**: Samenvoegen van onderdelen tot een functioneel WordPress-thema.
4. **Toegankelijkheid**: Gericht op gebruiksvriendelijkheid en bruikbaarheid voor zoveel mogelijk mensen.

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

---

## Ontwikkelstatus
- Zie de [Devlog](#devlog) voor een gedetailleerd overzicht van afgeronde onderdelen en geplande taken.

---

## Ideeën voor de toekomst

- Omzetten naar een blocktheme met `theme.json` en ondersteuning voor Gutenberg-blokken.
- Custom posttype voor boekencollectie of leeslijst.

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


---

## Licentie

Dit project valt onder de **MIT License**.

> Het project is openbaar beschikbaar, maar primair bedoeld voor mijn eigen blog. Het wordt gedeeld als leerproject en ter documentatie – niet als kant-en-klaar commercieel product.

---

## Bijdragen

Pull requests en suggesties zijn welkom, maar houd er rekening mee dat dit een persoonlijk project is. Bekijk gerust de code en gebruik wat je leert.

---

## Devlog

## Afgerond

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
- **Back to top-knop ontworpen, geïmplementeerd en getest** (toegankelijk, mobielvriendelijk, met animatie en voorkeuren voor `reduced motion`)  


## Nog te doen

- `page.html` als structuurtemplate voor o.a. search/404
- Consistente focusstijl toevoegen (voor buttons, links, inputs – in light & dark mode)
- Submenu toevoegen aan hoofdmenu (met aandacht voor toetsenbordnavigatie en aria-attributen) 
- Zoekfunctie verder integreren in WordPress-thema
- WordPress PHP-integratie voltooien (loop, dynamic content, template parts)
- Logo optimaliseren voor light en dark mode
- Favicon aanpassen (licht/donker)
- Instellingenmenu inbouwen
- Toegankelijkheid testen met tools als WAVE (Gebeurt tijdens het hele proces)

## SEO-taken

- Voeg `<title>` en `<meta name="description">` toe per pagina of dynamisch via WordPress
- Zorg voor juiste heading-structuur (één `<h1>`, hiërarchisch correct)
- Gebruik beschrijvende alt-teksten voor afbeeldingen
- Voeg `aria-label`s en `role`-attributen toe waar nodig voor screenreaders
- Gebruik semantische HTML-elementen (`<main>`, `<article>`, `<nav>`, etc.)
- Voeg `robots.txt` en eventueel een sitemap.xml toe bij live publicatie
- Zorg dat paginatitels en URLs duidelijk zijn (permalinks in WordPress)
- Controleer performance en SEO via tools zoals Lighthouse of PageSpeed Insights

## Ideeën voor later

- Thema omzetten naar block theme met `theme.json`
- Custom post type maken voor gelezen boeken

>  De footer fluistert iets… maar alleen als je goed kijkt 👀

## Changelog

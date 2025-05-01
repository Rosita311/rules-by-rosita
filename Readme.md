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
- Primair: `#D96377`
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

## Huidige status

### Gereed

- Header met dark mode toggle.
- Blogcards met klikbare gebieden en toegankelijke markup.
- Footer werkt goed op verschillende schermgroottes.

### Nog te doen

- Optimalisatie van homepage en single-pagina.
- Verdere uitwerking van de footer.
- Verbetering van mobiele spacing en layout.
- Toegankelijkheidsverfijningen (contrast, ARIA, rollen).
- Logo toevoegen dat geschikt is voor dark mode.
- Visuele updates: hover- en focusstijlen, blogcards en navigatie.
- Layout fine-tunen voor volledige responsiveness.

---

## Bekende problemen

- Logo is nog niet geoptimaliseerd voor dark mode.
- Navigatie-informatie wordt niet optimaal voorgelezen door schermlezers.

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

## Changelog

### 1.0.0 – 2025-05-01

- Eerste versie van het thema
- Basiselementen geïmplementeerd: header, blogcards, footer
- Responsief ontwerp toegevoegd
- Dark mode via `prefers-color-scheme`, toggle en `localStorage`
- Eerste verbeteringen in toegankelijkheid
- Zoekfunctie toegevoegd

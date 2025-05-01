# Rules by Rosita Theme

## Inleiding

Het **Rules by Rosita Theme** is een op maat gemaakt WordPress-thema dat ik ontwikkel als leerproject. Het doel van dit project is om mijn vaardigheden als developer te verbeteren door een volledig functioneel en toegankelijk thema te bouwen met moderne technieken.

Het thema wordt ontwikkeld in **HTML**, **CSS**, **PHP** en **JavaScript**, met aandacht voor **responsiviteit**, **toegankelijkheid** en **gebruiksvriendelijkheid**. Het zal worden gebruikt op mijn eigen persoonlijke blog, en staat openbaar op GitHub als referentie voor anderen of toekomstige uitbreidingen.

---

## Ontwikkelproces

Het ontwikkelproces bestaat uit de volgende stappen:

1. Ik bouw eerst een volledig werkende statische mock-up in **HTML**, **CSS** en **JavaScript**.
2. Vervolgens worden de onderdelen van deze mock-up opgesplitst in **template parts** binnen WordPress.
3. Deze template parts worden samengevoegd in PHP-bestanden om zo het volledige WordPress-thema op te bouwen.
4. De focus ligt op toegankelijke en gebruiksvriendelijke content voor zoveel mogelijk mensen. Dark mode helpt om het lezen prettiger te maken, vooral in situaties met weinig licht.

---

## Features

- **Responsief design**: Werkt goed op mobiele apparaten, tablets en desktops.
- **Toegankelijkheid**: Geoptimaliseerd voor schermlezers zoals NVDA en Windows Verteller etc.
- **Dark Mode**: Ondersteuning voor een donkere modus via CSS-variabelen.
- **Zoekfunctionaliteit**: Gebruikers kunnen snel content vinden.

---

## Design

Het ontwerp is geïnspireerd op mijn huidige persoonlijke blog. Het thema heeft een minimalistische, heldere stijl met nadruk op leesbaarheid.

### Kleurenpalet

**Licht thema:**

- **Tekst:** `#192324`
- **Primair:** `#D7233E`
- **Accent 1:** `#F8C9D7`
- **Accent 2:** `#EBEBEB`
- **Footer:** `#CBEEF3`
- **Contrastkleur:** `#49B3C1`
- **Achtergrond:** `#F8F4F5`
- **Menu-knop hover:** `#F8C9D7`
- **Button hover:** `#E38CA6`
- **Button tekst:** `#F8F4F5`
- **Hero achtergrond:** `#F8C9D7`

**Donker thema:**

- **Tekst:** `rgba(255, 255, 255, 0.87)`
- **Primair:** `#D96377`
- **Accent 1:** `#E38CA6`
- **Accent 2:** `#293A3D`
- **Footer:** `#103C42`
- **Contrastkleur:** `#45A4B0`
- **Achtergrond:** `#192324`
- **Card achtergrond:** `#293A3D`
- **Menu-knop hover:** `#293A3D`
- **Button hover:** `#E38CA6`
- **Button tekst:** `#192324`
- **Hero achtergrond:** `#103C42`

### Lettertypen

- **Bodytekst:** `Nunito, sans-serif`
- **Koppen:** `Zilla Slab, serif`

---

## Toegankelijkheid

Toegankelijkheid staat centraal in dit project. Kenmerken:

- **Skiplink**: Voor snelle toegang tot de hoofdinhoud.
- **Dark Mode**: Voor gebruikers die de voorkeur geven aan minder fel licht.
- **Semantische HTML en ARIA-roles**: Verbeteren de leesbaarheid met schermlezers.
- **Tabvolgorde**: Zorgt voor logische en toegankelijke navigatie.

---

## Huidige status

### Voltooide componenten

- **Header**  
  - Volledig functioneel  
  - Dark mode toggle werkt en wordt onthouden  
- **Blogcards**  
  - Klikbare cards
  - Basis toegankelijkheid getest  
- **Footer**  
  - Structuur staat en is responsive  
  - Widget-area’s worden geladen

### Te optimaliseren

- **Homepage & single.php**  
  - Layout finetunen  
  - Dynamische inhoud via The Loop valideren  
- **Footer**  
  - Extra navigatie-elementen en widget-areas uitbreiden  
- **Mobiele weergave**  
  - Marges, padding en grid/gutters aanpassen  
- **Toegankelijkheid**  
  - Extra `aria-labels` en `role`-attributen toevoegen  
  - Contrast van UI-elementen verder optimaliseren  
- **Dark mode logo**  
  - Vervang door contrast-optimale SVG voor donkere achtergrond  
- **Visuele stijl**  
  - Focus-staten voor knoppen en links uitbreiden  
  - Navigatie-animaties en card hover-effects verfijnen  
- **Cross-device**  
  - Testen en aanpassen op desktop, tablet en mobiel

---

## Bekende problemen

- **Logo licht/donker**  
  - Huidige SVG mist voldoende contrast in `.darkmode`  
- **Post-meta navigatie**  
  - Niet alle schermlezers lezen de metadata correct uit  
  - ARIA-attributen en semantische tags moeten worden verbeterd

---

## Ideeën voor de toekomst

- **Block theme**  
  - Migratie naar `theme.json` en React-powered Gutenberg-blocks  
- **Custom Post Type “Books”**  
  - Met eigen archive- en single-template  

---

## Gebruikte tools & technologieën

- **WordPress** (Themekoken vanaf scratch)  
- **HTML5**, **CSS3**, **JavaScript (ES6+)**, **PHP 8+**  
- **Git & GitHub** (feature branches, rebases, pull requests)  
- **VS Code** + **GitHub Copilot** (snelle commit messages)  
- **LocalWP** voor lokale development  
- **Google Fonts** (`Nunito`, `Zilla Slab`)  
- **Tabler Icons** via CDN (inline SVG voor metadata)  
- **Flexbox** & **CSS Grid** (layout)  
- **clamp()** & **min()** (fluid spacing & font scaling)  
- **WAVE** & **Lighthouse** (accessibility audits)  
- **GitHub Pages** voor statische mock-up demo

---


## Licentie

Dit project wordt gedeeld onder de **MIT License**.

### Wat betekent dit?

- Je mag de code **gebruiken, kopiëren, aanpassen en verspreiden**, zolang je mijn naam als maker vermeldt.
- Er zijn **geen garanties** of aansprakelijkheden.
- Ideaal voor leerdoeleinden of hergebruik, maar **op eigen risico**.

> Hoewel het project openbaar is, is het primair bedoeld voor **persoonlijk gebruik** op mijn eigen blog. Het wordt gedeeld ter documentatie en als leerproject, niet als kant-en-klaar commercieel thema.

---

## Bijdragen

Pull requests en suggesties zijn welkom, maar houd in gedachten dat dit een persoonlijk project is. Voel je vrij om de code te bekijken, te leren of ideeën op te doen.
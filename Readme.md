# Rules by Rosita Theme

[Nederlands](#nederlands) • [English](#english)

## Nederlands

## Inleiding

Het **Rules by Rosita Theme** is een op maat gemaakt WordPress-thema dat ik ontwikkel als leerproject.  
Het thema is gericht op **toegankelijkheid, responsiviteit** en **darkmode**, en is ontworpen en gebouwd voor mijn persoonlijke blog.  
De code is openbaar beschikbaar als leerbron en om mijn ontwikkelproces te documenteren.

## Features
- **Responsief design**: mobiel, tablet en desktop  
- **Toegankelijk**: semantische HTML, ARIA-ondersteuning, toetsenbordnavigatie  
- **Dark mode**: automatisch (prefers-color-scheme) + handmatige toggle (localStorage)  
- **Zoekfunctie** geïntegreerd in WordPress  
- **Minimalistisch design** met helder kleurenpalet en toegankelijke contrasten  
- **Instellingenmenu** met toegankelijkheidsopties (groot lettertype, leesbaar lettertype, hoog contrast, animaties uit)  
- **Linkshandig modus**: toegankelijkheidsoptie die knoppen en menu naar links verplaatst op mobiel  
- **Syntaxiskleuring**: Prism.js met Pink Cat Boo-kleurenpalet; taal instelbaar per codeblok via een dropdown in de Gutenberg-editor  

## Design
- **Typografie**: Nunito (body) & Zilla Slab (koppen) via Google Fonts  
- **Iconen**: Tabler Icons (lichte, toegankelijke SVG-iconen)  
- **Kleurenpalet**: afgestemd voor licht en donker thema  

## Toegankelijkheid
- Skiplink naar hoofdinhoud  
- Correcte headingstructuur  
- Voorkeuren voor `prefers-reduced-motion`  
- Consistente tabvolgorde  
- Contrast-proof kleurgebruik  
- Instellingenmenu met toegankelijkheidsopties  
- Linkshandig modus voor éénhandig gebruik op mobiel  

## CSS-naamgeving — BEM

Alle CSS-classes volgen de [BEM](https://getbem.com/)-methodologie (Block Element Modifier):

```
.block
.block__element
.block--modifier
.block__element--modifier
```

Classes die bewust plat zijn gehouden (gedeeld over meerdere blocks):
- `.container-main`, `.sr-only`, `.btn`, `.entry-content`
- `.hover-shadow-pink` / `.hover-shadow-blue`
- `.dotted-background-pink` / `.dotted-background-blue`
- `.social-media`

WordPress-gegenereerde classes (niet hernoemd):
- `.widget`, `.comment`, `.comment-list`, `.has-submenu`, `.submenu`, `.wp-block-*`

## Gebruikte tools & technologieën
- WordPress  
- HTML, CSS (Flexbox & Grid), JavaScript (ES modules), PHP  
- Git & GitHub  
- LocalWP  
- VS Code + GitHub Copilot  
- [esbuild](https://esbuild.github.io/) (JavaScript bundler)  
- [Prism.js](https://prismjs.com/) (syntaxiskleuring)

## JavaScript ontwikkeling

De JavaScript is opgesplitst in ES-modules in de map `js/src/`:

```
js/src/
├── main.js                  — instappunt, importeert alles
└── modules/
    ├── focus-trap.js        — toetsenbordfocusbeheer
    ├── menu.js              — sidebar en responsief navigatiemenu
    ├── darkmode.js          — dark mode toggle en localStorage
    ├── search.js            — zoekoverlay
    ├── accessibility.js     — toegankelijkheidspaneel en instellingen
    ├── back-to-top.js       — terug naar boven knop
    └── prism.js             — syntaxiskleuring voor codeblokken (Prism.js)
```

`js/script.js` is het gebundelde en geminificeerde eindbestand dat WordPress laadt. **Bewerk dit bestand nooit direct** — alle wijzigingen gaan via `js/src/`.

**Commando's:**

```bash
npm run build   # eenmalig bouwen voor productie
npm run dev     # bouwen en automatisch herbouwen bij wijzigingen
```

## Plugins
- Yoast (SEO)  
- Advanced Custom Fields 
- Ads.txt Manager 
- Antispam Bee  
- Imsanity  
- Forminator  
- Complianz  
- Limit Login Attempts Reloaded  
- WPS Hide Login
- Theme Check  (niet op de live site)
- Site Kit by Google  
- WP Accessibility  
- Accessibility Checker (niet op de live site)
- Jetpack  

## Documentatie & Bronnen
- [MDN Web Docs](https://developer.mozilla.org)  
- [WordPress Developer Handbook](https://developer.wordpress.org/themes/)  
- [A11Y Project](https://www.a11yproject.com)  
- [WCAG – W3C richtlijnen](https://www.w3.org/WAI/standards-guidelines/wcag/)  
- [Josh Comeau – Modern CSS Reset](https://www.joshwcomeau.com/css/custom-css-reset/)  

## Licentie
Dit project valt onder de MIT License.  
Het thema is openbaar beschikbaar, maar primair bedoeld voor mijn eigen blog en leerproces.

## Devlog
Zie [DEVLOG.md](./DEVLOG.md) voor een overzicht van afgeronde onderdelen, lopende taken en toekomstige ideeën.

---

## English

## Introduction

The **Rules by Rosita Theme** is a custom-made WordPress theme I’m developing as a learning project.  
The theme focuses on **accessibility, responsiveness**, and **darkmode**, and is designed and built for my personal blog.  
The code is publicly available as a learning resource and to document my development process.

## Features
- **Responsive design**: optimized for mobile, tablet, and desktop  
- **Accessible**: semantic HTML, ARIA support, keyboard navigation  
- **Dark mode**: automatic (prefers-color-scheme) + manual toggle (localStorage)  
- **Search functionality** integrated into WordPress  
- **Minimalistic design** with a clean color palette and accessible contrasts  
- **Settings menu** with accessibility options (larger font size, readable font, high contrast, disable animations)  
- **Left-handed mode**: accessibility option that moves buttons and menu to the left on mobile  
- **Syntax highlighting**: Prism.js with a Pink Cat Boo color palette; language selectable per code block via a dropdown in the Gutenberg editor  

## Design
- **Typography**: Nunito (body) & Zilla Slab (headings) via Google Fonts  
- **Icons**: Tabler Icons (lightweight, accessible SVG icons)  
- **Color palette**: optimized for light and dark themes  

## Accessibility
- Skip link to main content  
- Proper heading structure  
- Support for `prefers-reduced-motion`  
- Consistent tab order  
- Contrast-proof color usage  
- Settings menu with accessibility options  
- Left-handed mode for one-handed use on mobile  

## CSS Naming — BEM

All CSS classes follow [BEM](https://getbem.com/) (Block Element Modifier):

```
.block
.block__element
.block--modifier
.block__element--modifier
```

Classes intentionally kept flat (shared across multiple blocks):
- `.container-main`, `.sr-only`, `.btn`, `.entry-content`
- `.hover-shadow-pink` / `.hover-shadow-blue`
- `.dotted-background-pink` / `.dotted-background-blue`
- `.social-media`

WordPress-generated classes (not renamed):
- `.widget`, `.comment`, `.comment-list`, `.has-submenu`, `.submenu`, `.wp-block-*`

## Tools & Technologies
- WordPress  
- HTML, CSS (Flexbox & Grid), JavaScript (ES modules), PHP  
- Git & GitHub  
- LocalWP  
- VS Code + GitHub Copilot  
- [esbuild](https://esbuild.github.io/) (JavaScript bundler)  
- [Prism.js](https://prismjs.com/) (syntax highlighting)

## JavaScript Development

JavaScript is split into ES modules inside `js/src/`:

```
js/src/
├── main.js                  — entry point, imports everything
└── modules/
    ├── focus-trap.js        — keyboard focus management
    ├── menu.js              — sidebar and responsive navigation
    ├── darkmode.js          — dark mode toggle and localStorage
    ├── search.js            — search overlay
    ├── accessibility.js     — accessibility panel and settings
    ├── back-to-top.js       — back to top button
    └── prism.js             — syntax highlighting for code blocks (Prism.js)
```

`js/script.js` is the bundled and minified output file that WordPress loads. **Never edit this file directly** — all changes go through `js/src/`.

**Commands:**

```bash
npm run build   # build once for production
npm run dev     # build and watch for changes
```

## Plugins
- Yoast (SEO)  
- Advanced Custom Fields 
- Ads.txt Manager 
- Antispam Bee  
- Imsanity  
- Forminator  
- Complianz  
- Limit Login Attempts Reloaded  
- WPS Hide Login
- Theme Check  (not on live site)
- Site Kit by Google  
- WP Accessibility  
- Accessibility Checker (not on live site)
- Jetpack  

## Documentation & Resources
- [MDN Web Docs](https://developer.mozilla.org)  
- [WordPress Developer Handbook](https://developer.wordpress.org/themes/)  
- [A11Y Project](https://www.a11yproject.com)  
- [WCAG – W3C Guidelines](https://www.w3.org/WAI/standards-guidelines/wcag/)  
- [Josh Comeau – Modern CSS Reset](https://www.joshwcomeau.com/css/custom-css-reset/)  

## License
This project is licensed under the MIT License.  
The theme is publicly available, but primarily intended for my own blog and learning process.

## Devlog
See [DEVLOG.md](./DEVLOG.md) for an overview of completed features, ongoing tasks, and future ideas.

## Changelog

### Version 1.7.2 - 15-5-2026
- Add wavy border styles to block editor (`editor-style.css`) so editor preview matches front end
- Load Google Fonts inside editor iframe via `add_editor_style()` — fixes font display after WordPress 6.0+ iframe canvas change
- Fix code block padding: replace `background-clip: content-box` with gradient approach so dark background includes proper padding around code text
- Fix group block alignment in editor by using `margin-top`/`margin-bottom` instead of `margin` shorthand to preserve auto horizontal centering
- Add base `font-family` to `.editor-styles-wrapper` so all content inherits Nunito
- Rename wavy style labels to put color first: "Roze — golvende rand" etc. for easier identification in the style picker
- Fix tooltip `border-radius` inconsistency: `0.3rem` → `0.25rem` in accessibility and footer CSS

### Version 1.7.1 - 13-5-2026
- Add wavy left border styling for blockquote and pull quote blocks using CSS mask-image
- Fix pull quote default WordPress borders (border-top and border-bottom)
- Fix blog grid class name mismatch on 404 page (`blog-listing-grid` → `blog-listing__grid`)
- Add accessibility overrides for quote blocks (dyslexic font, high contrast)

### Version 1.7 - 5-5-2026
- Split `script.js` into ES modules using esbuild (`js/src/modules/`)
- Add npm build pipeline: `npm run build` and `npm run dev`
- Exclude `js/src/` and `node_modules/` from FTP deployment
- Add `node_modules/` to `.gitignore`

### Version 1.6 - 30-4-2026
- Make back-to-top button, dark mode toggle, and accessibility panel optional via Customizer
- Add "Thema instellingen" section to Customizer for feature toggles
- Security fixes: add capability check to duplicate post action, remove `maybe_unserialize()` from meta copy, add `esc_url()` and `esc_attr()` to card templates
- Add workaround for Jetpack `wp-editor` conflict on widget editor screen

### Version 1.5 - 30-4-2026
- Replace all inline SVGs with a reusable `rules_by_rosita_icon()` helper function
- Move icons array to `inc/icons.php`; add filled icon support via `$filled` parameter
- Split `functions.php` into logical `inc/` files: customizer, social-widget, comments, admin
- Add static cache to icon function so the icons file is only read once per request
- Add `filemtime()` cache-busting fallback for CSS and JS assets
- Move Google Fonts URL to a named constant (`RULES_BY_ROSITA_FONTS_URL`)
- Remove debug `console.log` from `script.js`
- Escape copyright year in footer with `esc_html()`
- Move Google Analytics script out of `header.php`; GA ID now configurable via Customizer

### Version 1.4 - 23-4-2026
- Add left-handed mode toggle and styles for mobile accessibility

### Version 1.3 - 2-4-2026
- Improve mobile menu when Javascript not available.

### Version 1.2 - 31-3-2026
- Refactor all CSS classes to BEM methodology across all PHP templates, CSS files, and JavaScript

### Version 1.1 - 8-3-2026
- Add fixed positioning for back-to-top and accessibility buttons for improved accessibility
- Refactor accessibility button styles for improved layout and hover effects

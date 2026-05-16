import Prism from 'prismjs';
import 'prismjs/components/prism-markup';              // HTML
import 'prismjs/components/prism-css';                 // CSS (depends on markup)
import 'prismjs/components/prism-javascript';          // JS  (depends on markup)
import 'prismjs/components/prism-markup-templating';   // required by PHP
import 'prismjs/components/prism-php';                 // PHP (depends on markup + markup-templating)
import 'prismjs/components/prism-bash';                // Bash / command line
import 'prismjs/components/prism-json';                // JSON

const SVG_ATTRS = 'xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"';

const ICON_DEFAULT =
  `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 8l-4 4l4 4"/><path d="M17 8l4 4l-4 4"/><path d="M14 4l-4 16"/></svg>`;

const LANG_ICONS = {
  'language-php':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 12a10 9 0 1 0 20 0a10 9 0 1 0 -20 0"/><path d="M5.5 15l.395 -1.974l.605 -3.026h1.32a1 1 0 0 1 .986 1.164l-.167 1a1 1 0 0 1 -.986 .836h-1.653"/><path d="M15.5 15l.395 -1.974l.605 -3.026h1.32a1 1 0 0 1 .986 1.164l-.167 1a1 1 0 0 1 -.986 .836h-1.653"/><path d="M12 7.5l-1 5.5"/><path d="M11.6 10h2.4l-.5 3"/></svg>`,
  'language-css':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4l-2 14.5l-6 2l-6 -2l-2 -14.5l16 0"/><path d="M8.5 8h7l-4.5 4h4l-.5 3.5l-2.5 .75l-2.5 -.75l-.1 -.5"/></svg>`,
  'language-javascript':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4l-2 14.5l-6 2l-6 -2l-2 -14.5l16 0"/><path d="M7.5 8h3v8l-2 -1"/><path d="M16.5 8h-2.5a.5 .5 0 0 0 -.5 .5v3a.5 .5 0 0 0 .5 .5h1.423a.5 .5 0 0 1 .495 .57l-.418 2.93l-2 .5"/></svg>`,
  'language-markup':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4l-2 14.5l-6 2l-6 -2l-2 -14.5l16 0"/><path d="M15.5 8h-7l.5 4h6l-.5 3.5l-2.5 .75l-2.5 -.75l-.1 -.5"/></svg>`,
  'language-html':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4l-2 14.5l-6 2l-6 -2l-2 -14.5l16 0"/><path d="M15.5 8h-7l.5 4h6l-.5 3.5l-2.5 .75l-2.5 -.75l-.1 -.5"/></svg>`,
  'language-bash':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l3 3l-3 3"/><path d="M13 15l3 0"/><path d="M3 6a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2l0 -12"/></svg>`,
  'language-json':
    `<svg ${SVG_ATTRS}><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 16v-8l3 8v-8"/><path d="M15 8a2 2 0 0 1 2 2v4a2 2 0 1 1 -4 0v-4a2 2 0 0 1 2 -2"/><path d="M1 8h3v6.5a1.5 1.5 0 0 1 -3 0v-.5"/><path d="M7 15a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-2a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1h1a1 1 0 0 1 1 1"/></svg>`,
};

function injectLanguageIcons() {
  document.querySelectorAll( 'pre.wp-block-code' ).forEach( pre => {
    if ( pre.querySelector( '.code-block__language-icon' ) ) return;

    const langClass = [ ...pre.classList ].find( c => c.startsWith( 'language-' ) );
    const icon = LANG_ICONS[ langClass ] ?? ICON_DEFAULT;

    const span = document.createElement( 'span' );
    span.className = 'code-block__language-icon';
    span.innerHTML = icon;
    pre.appendChild( span );
  } );
}

export function initPrism() {
  if ( !document.querySelector( 'pre code[class*="language-"], pre[class*="language-"]' ) ) return;
  Prism.highlightAll();
  injectLanguageIcons();
}

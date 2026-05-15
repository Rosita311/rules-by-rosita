import Prism from 'prismjs';
import 'prismjs/components/prism-markup';              // HTML
import 'prismjs/components/prism-css';                 // CSS (depends on markup)
import 'prismjs/components/prism-javascript';          // JS  (depends on markup)
import 'prismjs/components/prism-markup-templating';   // required by PHP
import 'prismjs/components/prism-php';                 // PHP (depends on markup + markup-templating)
import 'prismjs/components/prism-bash';                // Bash / command line
import 'prismjs/components/prism-json';                // JSON

export function initPrism() {
  if ( !document.querySelector( 'pre code[class*="language-"], pre[class*="language-"]' ) ) return;
  Prism.highlightAll();
}

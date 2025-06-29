<footer>
  <div class="footer-container">
    <div class="footer-content">
      <div class="footer-menu">
        <h2>Menu</h2>
        <nav aria-label="Footer menu">
          <?php
  wp_nav_menu(array(
    'theme_location' => 'footer-menu',
    'container' => false,
    'menu_class' => 'footer-menu-list'
  ));
  ?>
        </nav>
      </div>
      <div class="footer-social">
        <div class="footer-subscribe">
          <h2>Abonneer je op mijn blog</h2>
          <form
            action="#"
            method="post"
            class="site-form">
            <div class="form-group">
              <label for="footer-email">E-mailadres:</label>
              <input
                type="email"
                id="footer-email"
                name="footer-email"
                required
                placeholder="Vul hier je e-mailadres in" />
            </div>
            <div class="form-submit">
              <button
                type="submit"
                class="btn btn-secondary footer-btn">
                Abonneer
              </button>
            </div>
            <p>
              Je kunt je op elk moment afmelden via de link in de footer van
              elke e-mail.
            </p>
          </form>
        </div>
        <div class="footer-social-media">
          <h2 id="social">Volg mij op Sociale media</h2>
          <ul aria-labelledby="social">
            <li>
              <a
                href="https://www.facebook.com/Rulesbyrosita/"
                aria-label="Bezoek mijn Facebookpagina">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://www.instagram.com/rulesbyrosita/"
                aria-label="Bezoek mijn Instagram profiel">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                  <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                  <path d="M16.5 7.5v.01" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/rosita-rampertaap/"
                aria-label="Bezoek mijn LinkedIn profiel">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path d="M8 11v5" />
                  <path d="M8 8v.01" />
                  <path d="M12 16v-5" />
                  <path d="M16 16v-3a2 2 0 1 0 -4 0" />
                  <path
                    d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://mstdn.social/@rulesbyrosita"
                aria-label="Bezoek mijn Mastodon profiel">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-mastodon">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M18.648 15.254c-1.816 1.763 -6.648 1.626 -6.648 1.626a18.262 18.262 0 0 1 -3.288 -.256c1.127 1.985 4.12 2.81 8.982 2.475c-1.945 2.013 -13.598 5.257 -13.668 -7.636l-.026 -1.154c0 -3.036 .023 -4.115 1.352 -5.633c1.671 -1.91 6.648 -1.666 6.648 -1.666s4.977 -.243 6.648 1.667c1.329 1.518 1.352 2.597 1.352 5.633s-.456 4.074 -1.352 4.944z" />
                  <path
                    d="M12 11.204v-2.926c0 -1.258 -.895 -2.278 -2 -2.278s-2 1.02 -2 2.278v4.722m4 -4.722c0 -1.258 .895 -2.278 2 -2.278s2 1.02 2 2.278v4.722" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://github.com/Rosita311"
                aria-label="Volg mij op GitHub">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-github">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path
                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://wordpress.com/reader/feeds/54417229"
                aria-label="Volg mij via WordPress.com">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-wordpress">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path d="M9.5 9h3" />
                  <path d="M4 9h2.5" />
                  <path d="M11 9l3 11l4 -9" />
                  <path d="M5.5 9l3.5 11l3 -7" />
                  <path
                    d="M18 11c.177 -.528 1 -1.364 1 -2.5c0 -1.78 -.776 -2.5 -1.875 -2.5c-.898 0 -1.125 .812 -1.125 1.429c0 1.83 2 2.058 2 3.571z" />
                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://nl.pinterest.com/rulesbyrosita/"
                aria-label="Volg mij op Pinterest">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-pinterest">
                  <path
                    stroke="none"
                    d="M0 0h24v24H0z"
                    fill="none" />
                  <path d="M8 20l4 -9" />
                  <path
                    d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" />
                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-info">
      <div
        class="footer-plumbob"
        tabindex="0"
        role="button"
        aria-describedby="plumbob-desc">
        <svg
          viewBox="0 0 100 160"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true">
          <polygon
            points="50,0 90,80 50,160 10,80"
            class="plumbob-shape" />
        </svg>
        <span
          id="plumbob-desc"
          class="sr-only">Sims plumbob animatie zegt: Sul sul!</span>
        <span
          class="plumbob-easteregg"
          aria-hidden="true"
          hidden>Sul sul!</span>
      </div>
      <p>&copy; 2025 Rules by Rosita</p>
    </div>
  </div>
</footer>
</body>
<?php
wp_footer(); // WordPress footer hook for scripts and styles 
?>

</html>
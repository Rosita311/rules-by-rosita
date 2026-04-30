<footer class="site-footer" role="contentinfo">
  <div class="site-footer__container">
    <div class="site-footer__content">
      <div class="site-footer__menu">
        <h2>Menu</h2>
        <nav aria-label="Footer menu">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container' => false,
            'menu_class' => 'site-footer__menu-list'
          ));
          ?>
        </nav>
      </div>
        <?php if (is_active_sidebar('footer-widgets')) : ?>
          <div class="site-footer__widgets">
            <?php dynamic_sidebar('footer-widgets'); ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="site-footer__info">
      <div
        class="plumbob"
        tabindex="0"
        aria-describedby="plumbob-desc">
        <svg
          viewBox="0 0 100 160"
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true">
          <polygon
            points="50,0 90,80 50,160 10,80"
            class="plumbob__shape" />
        </svg>
        <span
          id="plumbob-desc"
          class="sr-only">Sims plumbob animatie zegt: Sul sul!</span>
        <span
          class="plumbob__easter-egg"
          aria-hidden="true"
          hidden>Sul sul!</span>
      </div>
      <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Rules by Rosita. Geschreven en gebouwd door Rosita Rampertaap.</p>
    </div>
  </div>
</footer>
</body>
<?php
wp_footer();
?>
</html>

<footer class="site-footer" role="contentinfo">
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
      <div class="footer-widgets-container">
          <?php if (is_active_sidebar('footer-widgets')) : ?>
            <div class="footer-widgets">
              <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
          <?php endif; ?>
          <form
            action="#"
            method="post"
            class="site-form">
            <div class="form-group">
              <label for="footer-email">E-mailadres:</label>
              <div class="form-group-row">
                <input
                  type="email"
                  id="footer-email"
                  name="footer-email"
                  required
                  placeholder="Vul hier je e-mailadres in" />
                <button
                  type="submit"
                  class="btn btn-secondary footer-btn">
                  Abonneer
                </button>
              </div>
              <p>Dit is een testformulier — Jetpack werkt pas op een live site.</p>
          </form>
          <a href="<?php echo esc_url(home_url('/dit-bestaat-niet')); ?>">Bekijk de 404</a>
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
    <p>&copy; <?php echo date('Y'); ?> Rules by Rosita. All rights reserved.</p>
  </div>
  </div>
</footer>
</body>
<?php
wp_footer(); // WordPress footer hook for scripts and styles 
?>

</html>
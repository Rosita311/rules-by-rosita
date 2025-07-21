<?php if (is_active_sidebar('main-sidebar')) : ?>
        <aside class="sidebar">
          <div class="sidebar-inner">
            <?php dynamic_sidebar('main-sidebar'); ?>
          </div>
        </aside>
      <?php endif; ?>
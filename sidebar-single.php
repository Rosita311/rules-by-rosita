<?php if (is_active_sidebar('sidebar')) : ?>
        <aside class="sidebar" aria-label="Sidebar">
          <div class="sidebar__inner">
            <?php dynamic_sidebar('sidebar'); ?>
          </div>
        </aside>
      <?php endif; ?>
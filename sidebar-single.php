<?php if (is_active_sidebar('sidebar')) : ?>
        <aside class="sidebar">
          <div class="sidebar-inner">
            <?php dynamic_sidebar('sidebar'); ?>
          </div>
        </aside>
      <?php endif; ?>
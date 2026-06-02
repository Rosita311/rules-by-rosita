<?php if (function_exists('get_field')) :
    $homepage_id = get_option('page_on_front'); ?>
    <section class="introduction">
        <div class="introduction__content-wrapper">
            <div class="introduction__content entry-content">

                <?php
                $intro_titel = get_field('introductie_titel', $homepage_id);
                $intro_tekst = get_field('introductie_tekst', $homepage_id);
                $over_mij    = get_field('over_mij_titel', $homepage_id);
                $lezen       = get_field('lezen', $homepage_id);
                $lezen_link  = get_field('lezen_link', $homepage_id);
                $leren       = get_field('leren', $homepage_id);
                $leren_link  = get_field('leren_link', $homepage_id);
                $kijken      = get_field('kijken', $homepage_id);
                $kijken_link = get_field('kijken_link', $homepage_id);
                $btn_link    = get_field('knop_link', $homepage_id);
                $btn_text    = get_field('knop_link_tekst', $homepage_id);
                $img         = get_field('introductie_afbeelding', $homepage_id);
                ?>

                <?php if ($intro_titel) : ?>
                    <h2><?php echo esc_html($intro_titel); ?></h2>
                <?php endif; ?>

                <?php if ($intro_tekst) : ?>
                    <?php echo wp_kses_post($intro_tekst); ?>
                <?php endif; ?>

                <?php if ($over_mij || $lezen || $leren || $kijken) : ?>
                    <?php if ($over_mij) : ?>
                        <h3><?php echo esc_html($over_mij); ?></h3>
                    <?php endif; ?>

                    <ul class="introduction__icon-list">
                        <?php if ($lezen) : ?>
                            <li>
                                <?php echo rules_by_rosita_icon('books'); ?>
                                <span><span class="introduction__label">Ik lees:</span>
                                    <?php if ($lezen_link) : ?>
                                        <a href="<?php echo esc_url($lezen_link); ?>">
                                            <?php echo esc_html($lezen); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo esc_html($lezen); ?>
                                    <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($leren) : ?>
                            <li>
                                <?php echo rules_by_rosita_icon('code'); ?>
                                <span><span class="introduction__label">Ik leer:</span>
                                    <?php if ($leren_link) : ?>
                                        <a href="<?php echo esc_url($leren_link); ?>">
                                            <?php echo esc_html($leren); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo esc_html($leren); ?>
                                    <?php endif; ?>
                            </li>
                        <?php endif; ?>

                        <?php if ($kijken) : ?>
                            <li>
                                <?php echo rules_by_rosita_icon('device-tv'); ?>
                                <span><span class="introduction__label">Ik kijk:</span>
                                    <?php if ($kijken_link) : ?>
                                        <a href="<?php echo esc_url($kijken_link); ?>">
                                            <?php echo esc_html($kijken); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo esc_html($kijken); ?>
                                    <?php endif; ?>
                                </span>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($btn_link && $btn_text) : ?>
                    <a class="btn btn--secondary" href="<?php echo esc_url($btn_link); ?>">
                        <?php echo esc_html($btn_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="introduction__image-wrapper">
            <div class="introduction__image dotted-background-blue">
                <?php if ($img) : ?>
                    <img
                        src="<?php echo esc_url($img); ?>"
                        alt="<?php the_title_attribute(); ?>"
                        loading="lazy"
                        width="400"
                        height="400" />
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

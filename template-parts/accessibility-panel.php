<section
      id="accessibility-settings"
      class="accessibility-panel"
      role="dialog"
      aria-modal="true"
      aria-labelledby="accessibility-heading"
      hidden
    >
      <header class="accessibility-panel__header">
        <h2
          id="accessibility-heading"
          tabindex="-1"
          aria-live="polite"
        >
          Toegankelijkheid
        </h2>
      </header>

      <div class="accessibility-panel__group">
        <h3>Leesbaarheid</h3>
        <ul>
          <li>
            <button
            class="btn btn--icon-large"
              id="toggle-dyslexic"
              type="button"
              aria-pressed="false"
            ><?php echo rules_by_rosita_icon('letter-case'); ?>
                           Leesbaar lettertype
            </button>
          </li>
          <li>
            <button
            class="btn btn--icon-large"
              id="toggle-text"
              type="button"
              aria-pressed="false"
            >
              <?php echo rules_by_rosita_icon('text-size'); ?>
              Grotere tekst
            </button>
          </li>
        </ul>
      </div>

      <div class="accessibility-panel__group">
        <h3>Weergave</h3>
        <ul>
          <li>
            <button
            class="btn btn--icon-large"
              id="toggle-contrast"
              type="button"
              aria-pressed="false"
            >
              <?php echo rules_by_rosita_icon( 'contrast', filled: true ); ?>
              Hoog contrast
            </button>
          </li>
          <li>
            <button
            class="btn btn--icon-large"
              id="toggle-reduce-motion"
              type="button"
              aria-pressed="false"
            >
              <?php echo rules_by_rosita_icon('player-pause'); ?>
              Animaties uitschakelen
            </button>
          </li>
        </ul>
      </div>

      <div class="accessibility-panel__group">
        <h3>Overig</h3>
        <ul>
          <li>
            <button
            class="btn btn--icon-large"
              id="toggle-left-handed"
              type="button"
              aria-pressed="false"
            >
              <?php echo rules_by_rosita_icon('hand-finger'); ?>
              Linkshandig
            </button>
          </li>
          <li>
            <button
            class="btn btn--icon-large"
              id="reset-accessibility"
              type="button"
            >
              <?php echo rules_by_rosita_icon('restore'); ?>
              Herstel instellingen
            </button>
          </li>
        </ul>
        <button
          id="close-accessibility"
          class="btn--icon-small"
          aria-label="Sluit instellingen"
        >
          <?php echo rules_by_rosita_icon('x'); ?>
        </button>
      </div>
    </section>
    <button
      id="accessibility-toggle"
      class="accessibility-btn"
      aria-haspopup="dialog"
      aria-expanded="false"
      aria-controls="accessibility-settings"
      aria-label="Toegankelijkheidsinstellingen openen"
    >
      <?php echo rules_by_rosita_icon('accessible'); ?>
      <span
        class="accessibility-btn__tooltip"
        aria-hidden="true"
        >Toegankelijkheid</span
      >
    </button>

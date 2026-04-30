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
              <svg
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-restore"
              >
                <path
                  stroke="none"
                  d="M0 0h24v24H0z"
                  fill="none"
                />
                <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                <path d="M3 4.001v5h5" />
                <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
              </svg>
              Herstel instellingen
            </button>
          </li>
        </ul>
        <button
          id="close-accessibility"
          class="btn--icon-small"
          aria-label="Sluit instellingen"
        >
          <svg
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="icon icon-tabler icon-tabler-x"
          >
            <path
              stroke="none"
              d="M0 0h24v24H0z"
              fill="none"
            />
            <path d="M18 6L6 18M6 6l12 12" />
          </svg>
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
        class="icon icon-tabler icons-tabler-outline icon-tabler-accessible"
      >
        <path
          stroke="none"
          d="M0 0h24v24H0z"
          fill="none"
        />
        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
        <path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" />
        <circle
          cx="12"
          cy="7.5"
          r=".5"
          fill="currentColor"
        />
      </svg>
      <span
        class="accessibility-btn__tooltip"
        aria-hidden="true"
        >Toegankelijkheid</span
      >
    </button>

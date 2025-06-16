<section
      id="accessibility-settings"
      class="accessibility-panel"
      role="dialog"
      aria-labelledby="accessibility-heading"
      hidden
    >
      <header class="accessibility-header">
        <h2
          id="accessibility-heading"
          tabindex="-1"
          aria-live="polite"
        >
          Toegankelijkheid
        </h2>
      </header>

      <div class="accessibility-group">
        <h3>Leesbaarheid</h3>
        <ul>
          <li>
            <button
              id="toggle-dyslexic"
              type="button"
              aria-pressed="false"
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
                class="icon icon-tabler icons-tabler-outline icon-tabler-letter-case"
              >
                <path
                  stroke="none"
                  d="M0 0h24v24H0z"
                  fill="none"
                />
                <path
                  d="M17.5 15.5m-3.5 0a3.5 3.5 0 1 0 7 0a3.5 3.5 0 1 0 -7 0"
                />
                <path d="M3 19v-10.5a3.5 3.5 0 0 1 7 0v10.5" />
                <path d="M3 13h7" />
                <path d="M21 12v7" />
              </svg>
              Leesbaar lettertype
            </button>
          </li>
          <li>
            <button
              id="toggle-text"
              type="button"
              aria-pressed="false"
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
                class="icon icon-tabler icons-tabler-outline icon-tabler-text-size"
              >
                <path
                  stroke="none"
                  d="M0 0h24v24H0z"
                  fill="none"
                />
                <path d="M3 7v-2h13v2" />
                <path d="M10 5v14" />
                <path d="M12 19h-4" />
                <path d="M15 13v-1h6v1" />
                <path d="M18 12v7" />
                <path d="M17 19h2" />
              </svg>
              Grotere tekst
            </button>
          </li>
        </ul>
      </div>

      <div class="accessibility-group">
        <h3>Weergave</h3>
        <ul>
          <li>
            <button
              id="toggle-contrast"
              type="button"
              aria-pressed="false"
            >
              <svg
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="icon icon-tabler icons-tabler-filled icon-tabler-contrast"
              >
                <path
                  stroke="none"
                  d="M0 0h24v24H0z"
                  fill="none"
                />
                <path
                  d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-9 1.732a8 8 0 0 0 4.001 14.928l-.001 -16a8 8 0 0 0 -4 1.072"
                />
              </svg>
              Hoog contrast
            </button>
          </li>
          <li>
            <button
              id="toggle-reduce-motion"
              type="button"
              aria-pressed="false"
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
                class="icon icon-tabler icons-tabler-outline icon-tabler-player-pause"
              >
                <path
                  stroke="none"
                  d="M0 0h24v24H0z"
                  fill="none"
                />
                <path
                  d="M6 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"
                />
                <path
                  d="M14 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"
                />
              </svg>
              Animaties uitschakelen
            </button>
          </li>
        </ul>
      </div>

      <div class="accessibility-group">
        <h3>Overig</h3>
        <ul>
          <li>
            <button
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
      class="accessibility-button"
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
        class="accessibility-tooltip"
        aria-hidden="true"
        >Toegankelijkheid</span
      >
    </button>
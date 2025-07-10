 <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="site-form">
    <div class="form-group">
      <p id="search-instructions" class="sr-only">
  Typ een zoekterm en druk op Enter om te zoeken.
</p>
      <label id="search-label" for="search-input" class="search-label">Zoeken</label>
      <div class="form-group-row">
        <input
          id="search-input"
          class="search-input"
          type="search"
          name="s"
          placeholder="Waar ben je naar op zoek?"
          required
           aria-describedby="search-instructions"/>

        <button type="submit" class="btn btn-secondary">Zoeken</button>
      </div>
    </div>
  </form>
 <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="site-form">
   <div class="form-group">
     <label id="search-label" for="search-input" class="search-label">Zoeken</label>
     <!-- <p id="search-instructions" class="sr-only">
       Begin met typen en druk op Enter om te zoeken.
     </p> -->
     <div class="form-group-row">
       <input
         id="search-input"
         class="search-input"
         type="search"
         name="s"
         placeholder="Typ wat je wilt vinden."
         required 
         />
       <button type="submit" class="btn btn-secondary">Zoeken</button>
     </div>
   </div>
 </form>
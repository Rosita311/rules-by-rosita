 <search>
   <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="site-form">
     <div class="form-group">
       <label id="search-label" for="search-input" class="search-label">Zoeken</label>
       <div class="form-group-row">
         <input
           id="search-input"
           class="search-input"
           type="search"
           name="s"
           placeholder="Typ wat je wilt vinden." />
         <button type="submit" class="btn btn-secondary">Zoeken</button>
       </div>
     </div>
   </form>
 </search>
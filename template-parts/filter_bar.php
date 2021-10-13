<aside id="product-filter" class="hide-filter d-flex flex-row aside_visibility_hidden">
    <?php get_template_part( 'template-parts/Product','filter' ); ?>
    <div id="pokesbtnwrapper"><a id="pokesbtndisplay" ><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/></svg></a></div>
</aside>
<div class="static_filter_btn_wrapper">
    <div class="container-xl static_filter_btn_wrapper">
        <div class="row w-100 no-gutters">
            <span class="col-6"><h6 class="font-weight-bold">Not liking what you see, use the search!</h6></span>
            <span class="col-6 align-self-start"><button type="button" class="w-100 static_filter_btn btn btn-success font-weight-bold">S&nbsp;&nbsp; E&nbsp;&nbsp; A&nbsp;&nbsp; R&nbsp;&nbsp; C&nbsp;&nbsp; H</button></span>
        </div>
    </div>
</div>


<div id="mobile-btn-wrapper"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/></svg></div>

<div class="pokes-loader"></div>
<img class="pokes-loader" src="<?= set_image("loadingicon") ?>" alt="Loader">
<!-- Page: Landing -->
<?php get_header(); ?>

<div class="flex flex-column items-center pv4 ph3">
    <img class="mv3-xxl" src="<?php echo get_theme_file_uri( '/images/logo/full-logo.svg' ); ?>" alt="Belmonte logo" />
</div>
<main id="marquee_container_" class="flex-grow-1 overflow-hidden marquee" data-template-url="<?php echo get_theme_file_uri(); ?>">
    <div id="marquee-content" class="dn flex-md marquee-content" data-translated="0"></div>
    <div id="marquee-mobile" class="marquee-mobile flex"></div>
</main>
<div class="flex flex-column items-center pv4 ph3">
    <p class="measure-wide tc near-black f-16 lh-copy mb0 mt2 mt3-xl">
    Personas, sabores, calles y edificios forman parte de el corazón de este barrio donde los sonidos de ciudad se convierten en sinfonías ¿Qué nos identifica? ¿Cuál es nuestra esencia? El amor por los recuerdos de nuestro orígen.
    </p>
    <a class="blue dim f-14 ttu beatrice no-underline mt3 mt4-xxl mb0-lg mb3-xl" href="<?php echo get_home_url(); ?>">
    Continuar al sitio
    </a>
</div>

<?php get_footer(); ?>

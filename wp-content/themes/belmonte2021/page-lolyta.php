<!-- Page: Inicio -->
<?php get_header(); ?>

<?php include('inc/block-nav-menu.php'); ?>

<?php include('inc/block-sidebar.php'); ?>

<div class="flex flex-column min-height-vh-100--nav content order-2">
    <!-- EDIFICIO LOLYTA -->
    <section class="vh-100--nav flex flex-column items-center pv3 pv4-sm pv5-xxl ph3 ph4-sm ph0-lg gap3">
        <!-- <h1 class="tc f-80 beatrice-display ttu lh-solid blue ma0">Edificio Lolyta</h1> -->
        <img class="ma0" src="<?php echo get_theme_file_uri( 'images/logo/lolyta-logo.svg' ); ?>" alt="Lolyta">
        <div class="h-100 w-100 cover filter" style="background: url('<?php echo get_theme_file_uri( 'images/lolyta/lolyta.jpg' ); ?>') center"></div>
        <p class="f-16 measure tc dark-gray lh-copy">Homenaje a los fundadores de Monterrey y a su patrimonio arquitectónico regiomontano en proceso de cobrar nueva vida bajo el sello de la marca Belmonte.</p>
    </section>
	
    <section class="flex flex-row-md flex-column items-stretch ph3 ph4-sm ph0-lg pv4 pv5-sm gap4">
        <div class="w-50-md aspect-ratio--1x1 pb0-md cover filter" style="background: url('<?php echo get_theme_file_uri( 'images/lolyta/lolyta-detail.jpg' ); ?>') center"></div>
        <div class="w-50-md">
            <h1 class="f-24 beatrice ttu blue lh-copy ma0">Memoria industrial<br>recuperada</h1>
            <div class="flex flex-column gap3 mt4 mt5-xxl f-16 dark-gray lh-copy">
                <p class="ma0">El Edificio Lolyta fue diseñado por el arquitecto Arturo Estebán Flores a mediados de la década de los 40s. Originalmente albergó a la Fábrica de Vestidos Lolyta.</p>
                <p class="ma0">Hoy, a más de 70 años de su creación, el Edificio Lolyta propone una nueva función, la reconversión del espacio industrial en un proyecto habitable y multifuncional, siguiendo esquemas y estrategias modernas de revitalización urbana que ayudarán a regenerar el centro de nuestra ciudad y desarrollarlo económicamente.</p>
                <p class="ma0">Creemos que la preservación de nuestro patrimonio arquitectónico, así como la recuperación de nuestra memoria  industrial, nos fortalece como sociedad y nos ayudan a estrechar lazos con nuestra identidad regiomontana.</p>
                <p class="ma0">Desafiamos las inercias especulativas. Confiamos en este nuevo modelo de negocio que no se enfoca en la voracidad inmobiliaria sino en la conciencia y el sentido de comunidad.</p>
            </div>
            <div class="flex flex-column items-end w-100 mt4 mt5-xxl">
                <img class="w-auto-sm w-50" src="<?php echo get_theme_file_uri( 'images/lolyta/signature.png' ); ?>" alt="">
                <p class="mt3 mb0 near-black f-16">Artemio Salinas, Belmonte CEO</p>
            </div>
        </div>
    </section>
	
	<?php include('inc/block-footer.php'); ?>

</div>

<?php include('inc/block-navbar.php'); ?>

<?php get_footer(); ?>

<!-- Page: Menu Test -->
<?php get_header(); 

include('inc/block-nav-menu.php');

include('inc/block-sidebar.php');

$menu_query = new WP_Query( array(
    'post_type' => 'platillos',
    'posts_per_page' => 25
) ); 

if ( $menu_query->have_posts() ) :
    // comienza a ordenar las secciones del menu siguiendo el orden de los horarios
    $schedule_object = get_field_object( 'section_schedule', $menu_query->post->ID );
    $schedule_choices = $schedule_object['choices'];
    $schedule_sorting = array_keys( $schedule_choices );
    
    // usort -> ordena un arreglo con una funcion de comparacion por definir
    usort( $menu_query->posts, function( $a, $b ) use ( $schedule_sorting ) {
        // se obtiene el valor de horario de las secciones a comparar
        $schedule_a = get_field( 'section_schedule', $a->ID );
        $schedule_b = get_field( 'section_schedule', $b->ID );
        // busca el indice de orden dentro de los horarios
        $index_a = array_search( $schedule_a, $schedule_sorting );
        $index_b = array_search( $schedule_b, $schedule_sorting );
        // Si [a] es menor o igual a [b] entonces [a] va antes que [b], de otra forma [a] va despues de [b]
        return $index_a > $index_b ? 1 : -1;
    } );
    // termina el ordenamiento
?>

<div class="content order-2">
    <section class="flex flex-column items-center pv3 pv4-sm pv5-xxl ph3 ph4-sm ph0-lg">
        <h1 class="beatrice-display f-96 ttu lh-solid ma0 blue">Menú</h1>
        <i class="f-16 measure-narrow tc lh-copy mt2">Menú elaborado con ingredientes de la más alta calidad y mucha pasión</i>

        <ul class="flex items-center list mb0 pa0 mt5-sm mt4 f-16">
        <?php
        $menu_nav_counter = 1;
        $menu_nav_length = count( $schedule_choices ) - 1; // without am-and-pm
        foreach ( $schedule_choices as $value => $label ) :
            if ( $value !== 'am-and-pm' ) :
        ?> 
            <li class="ttu beatrice <?php if ( $menu_nav_counter < $menu_nav_length ) echo 'pr4 mr4 br bw1'; ?>">
                <a class="no-underline dim pointer" id="<?php echo $value; ?>-toggle"><?php echo $label ?></a>
            </li>
        <?php
                $menu_nav_counter++;
            endif;
        endforeach;
        ?>
        </ul>

        <div class="grid w-100 mt3">
        <?php
        while ( $menu_query->have_posts() ) : 
            $menu_query->the_post();
        ?>
            <article class="accordion <?php the_field( 'section_schedule' ); ?> relative bg-near-white mt3">
                <a class="flex justify-between items-center pa3 ba bw1 black bg-near-white no-underline sticky top-nav z-1 pointer">
                    <div class="flex items-baseline">
                        <h4 class="f-16 ttu sans-serif ma0"><?php echo strtoupper( get_the_title() ); ?></h4>
                        <i class="f-14 ml2"><?php the_field( 'section_description' ); ?></i>
                    </div>
                    <button></button>
                </a>
                <div class="accordion-content br bl bb bw1 ph3 lh-copy flex flex-column overflow-hidden">
                <?php     
                $menu_dishes = get_field( 'section_dishes' );
                foreach ( $menu_dishes as $dish ) :
                ?>
                    <div class="mv2">
                        <h6 class="ma0 f-14">
                            <?php echo ( $dish['dish_name'] . ' – $' . $dish['dish_price'] ); ?>
                        </h6>
                        <p class="ma0 f-14 dark-gray">
                            <?php echo $dish['dish_description']; ?>
                        </p>
                    </div>
                <?php
                endforeach;
                ?>
                </div>
            </article>
        <?php     
        endwhile;
        wp_reset_postdata();
        ?>
        </div>
    </section>
	
	<?php include('inc/block-footer.php'); ?>

</div>

<?php endif;

include('inc/block-navbar.php');

get_footer(); ?>
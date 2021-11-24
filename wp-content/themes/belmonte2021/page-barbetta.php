<!-- Page: Inicio -->
<?php get_header(); ?>

<nav class="fixed w-100 top-0 ph4-sm ph3 pv3 bg-near-white z-999 nav-hidden">
    <div class="flex justify-between items-center">
        <img class="nav-logo" src="<?php echo get_theme_file_uri( 'barbetta/images/barbetta-logo.svg' ); ?>" alt="Barbetta">
        <ul class="flex items-center list ma0 pa0">
            <li class="flex-md dn">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim" href="<?php echo get_permalink( get_page_by_path( 'inicio' ) ); ?>">Belmonte</a>
            </li>
            <li class="flex-md ml4-lg ml3 dn">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim" href="https://www.instagram.com/barbetta_mty/?hl=es">Instagram</a>
            </li>
            <!-- <li class="flex-md ml4-lg ml3 dn">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim" href="">Facebook</a>
            </li> -->
            <?php
            $info_reservation = get_field( 'info_reservation', 'options' );
            if ( $info_reservation ) :
            ?>
            <li class="flex-md ml4-lg ml3">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim pa3-sm pv2 ph3 br-pill ba bw1 flex items-center" href="<?php echo esc_url( $info_reservation['url'] ); ?>">
                    <img src="<?php echo get_theme_file_uri( 'barbetta/images/whatsapp-logo.svg' ); ?>">
                    <span class="ml1"> <?php echo $info_reservation['title']; ?> </span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<!-- MAIN -->
<?php
$main_image = get_field( 'main_image' );
?>
<header class="flex items-center justify-center vh-100">
    <div class="w-two-thirds-lg self-stretch w-100 bg-orange">
        <div class="flex flex-column items-center justify-between h-100 pa4-sm pv4 ph3 z-2">
            <img class="logo" src="<?php echo get_theme_file_uri( 'barbetta/images/barbetta-logo.svg' ); ?>" alt="Barbetta">
            <h1 class="ttu serif f-120 wermut ma0 lh-solid tc"><?php the_field( 'main_header' ); ?></h1>
            <div class="flex justify-between items-baseline w-100 bt b--black-40 pt3">
                <p class="mw5 w-50 tl ma0 lh-copy f-16"><?php the_field( 'main_description' ); ?></p>
                <p class="mw5 w-40 tr ma0 lh-copy f-16"><?php the_field( 'main_schedule' ); ?></p>
            </div>
        </div>
    </div>
    <div class="w-third-lg w-50-md w-60 static-lg h-100-lg h-50 absolute cover mb0-lg mb4 z-1 header-image" style="background: url('<?php echo esc_url( $main_image['sizes']['large'] ); ?>') center"></div>
</header>

<!-- MENU -->
<div class="ph3-sm bg-near-white">
    <div class="flex flex-wrap">
    <?php
    if ( have_rows( 'menu_sections' ) ) :
        while ( have_rows( 'menu_sections' ) ) :
            the_row();
            if ( get_row_layout() == 'menu_visual' ) :
                $section_image = get_sub_field( 'section_image' );
    ?>
        <div class="w-third-lg w-50-sm w-100 pt5 ph3">
            <div class="flex flex-column justify-between h-100 relative">
                <h3 class="f-36 ma0 measure-narrow"><?php the_sub_field( 'section_text' ); ?></h3>
                <img class="mt6-md mt4" src="<?php echo esc_url( $section_image['sizes']['large'] ); ?>">
            </div>
        </div>
    <?php   elseif ( get_row_layout() == 'menu_items' ) : ?>
        <div class="w-third-lg w-50-sm w-100 pt5 ph3">
            <div class="flex justify-between items-baseline bb b--black-50 pb3">
                <span class="graphik ttu fw6 f-14"><?php the_sub_field( 'section_title' ); ?></span>
                <span class="graphik ttu fw6 f-14"><?php the_sub_field( 'section_description' ); ?></span>
            </div>
            <?php
                if ( have_rows( 'section_items' ) ) :
            ?>
            <ul class="flex flex-column list ma0 ph0 pt3">
            <?php
                    while ( have_rows( 'section_items' ) ) :
                        the_row();
            ?>
                <li class="mt4-sm mt3">
                    <div class="flex justify-between items-baseline">
                        <h5 class="f-24 ma0"><?php the_sub_field( 'item_title' ); ?></h5>
                        <span class="f-14 graphik fw6">(<?php the_sub_field( 'item_price' ); ?>)</span>
                    </div>
                    <p class="f-14 ma0 graphik mt2 measure-narrow lh-copy dark-gray"><?php the_sub_field( 'item_description' ); ?></p>
                </li>
            <?php   endwhile; ?>
            </ul>
            <?php
                endif;
            ?>
        </div>
    <?php
            endif;
        endwhile;
    endif;
    ?>
    </div>
</div>

<footer class="mt6-sm mt5 ph4-sm ph3">
    <div class="flex flex-row-lg flex-column justify-between items-center bt b--black-50 pv5">
        <div class="flex flex-column items-start-lg items-center">
            <img src="<?php echo get_theme_file_uri( 'barbetta/images/barbetta-logo.svg' ); ?>" alt="Barbetta">
            <?php
            $info_address = get_field( 'info_address', 'options' );
            if ( $info_address ) :
                $full_address = $info_address['address'];
                $state = $info_address['state'];
                $formatted_address = str_replace( 'N.L.', $state, $full_address );
            ?>
            <p class="f-16 lh-copy dark-gray tl-lg tc"><?php echo $formatted_address; ?></p>
            <?php endif; ?>
        </div>
        <ul class="flex flex-row-sm flex-column items-center list mt0-lg mb0 mt4-sm mt3 pa0">
            <li class="flex">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim" href="<?php echo get_permalink( get_page_by_path( 'inicio' ) ); ?>">Belmonte</a>
            </li>
            <li class="flex ml4-md ml3-sm mt0-sm mt3">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim" href="https://www.instagram.com/barbetta_mty/?hl=es">Instagram</a>
            </li>
            <!-- <li class="flex ml4-md ml3-sm mt0-sm mt3">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim" href="">Facebook</a>
            </li> -->
            <?php if ( $info_reservation ) : ?>
            <li class="flex ml4-md ml3-sm mt0-sm mt3">
                <a class="ttu graphik f-14 ttu fw6 no-underline dim pa3 br-pill ba bw1 flex items-center" href="<?php echo esc_url( $info_reservation['url'] ); ?>">
                    <img src="<?php echo get_theme_file_uri( 'barbetta/images/whatsapp-logo.svg' ); ?>">
                    <span class="ml1"> <?php echo $info_reservation['title']; ?> </span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</footer>

<?php get_footer(); ?>

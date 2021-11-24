<!-- Page: Inicio -->
<?php get_header(); ?>

<?php include('inc/block-nav-menu.php'); ?>

<?php include('inc/block-sidebar.php'); ?>

<div class="content order-2">
	<!-- PRINCIPAL -->
	<!-- <section class="vh-100--nav flex flex-column pv3 pv4-sm pv5-xxl ph3 ph4-sm ph0-lg gap3">
		<div class="flex justify-between items-center">
			<div class="flex flex-column">
				<span class="ttu f-16"><?php //the_field( 'main_subtitle' ); ?></span>
				<h1 class="f-96 ttu beatrice-display lh-solid mt2 mb0 blue">
				<?php //the_field( 'main_title' ); ?>
				</h1>
			</div>
			<?php
			//$main_cta = get_field( 'main_cta' );
			//if ( $main_cta ) :
			?>
			<a href="<?php //echo esc_url( $main_cta['url'] ); ?>" class="flex flex-column items-center justify-center flex-shrink-0 circle-link br-100 beatrice ttu bg-blue near-white pointer grow ph2 no-underline">
				<span class="tc f-14 mt2 mt3-sm"><?php //echo $main_cta['title']; ?></span>
				<i class="icon-size dim cover mt1" style="background:url('<?php //echo get_theme_file_uri( '/images/icons/arrow-forward.svg' ); ?>')"></i>
			</a>
			<?php //endif; ?>
		</div>
		<?php
		/*
		$main_banner = get_field( 'main_banner' );
		if ( $main_banner ) :
			if ( count( $main_banner ) == 1 ) :
				$image = $main_banner[0];
		*/
		?>
		<div class="h-100 cover filter" style="background: url('<?php //echo esc_url( $image['sizes']['large'] ); ?>') center"></div>
		<?php 
			//else : 
		?>
		<div class="h-100 cover filter" style="background: url('<?php //echo get_theme_file_uri( '/images/hero/happy-hour.jpg' ); ?>') center"></div>
		<?php 
			//endif; 
		//endif;
		?>
	</section> -->
	<!-- DE DIA, TARDE Y NOCHE -->
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<h1 class="beatrice-display ttu f-48 ma0 tc blue">De día, tarde y noche</h1>
		<p class="f-16 tc measure-narrow lh-copy dark-gray mt3 mb0">
			Ven y disfruta de deliciosos platillos y bebidas durante todo el día en Café Belmonte.
		</p>
		<div class="w-100 flex flex-nowrap-md flex-row-md flex-column items-center gap4-xl gap3 mt4">
		<?php
		if ( have_rows( 'menu_cards' ) ) :
			while ( have_rows( 'menu_cards' ) ) : 
				the_row();

				$card_image = get_sub_field( 'card_image' );
				$card_link = get_sub_field( 'card_link' );
		?>
			<a href="<?php echo esc_url( $card_link['url'] ); ?>" class="w-third-md w-100 pointer no-underline link bg-animate hover-bg-blue hover-near-white z-0">
				<div class="aspect-ratio aspect-ratio--5x7-lg aspect-ratio--5x8-md aspect-ratio--16x9">
					<div class="aspect-ratio--object cover filter-hover" style="background:url('<?php echo esc_url( $card_image['sizes']['large'] ); ?>') center;"></div>
				</div>
				<div class="beatrice ttu f-14 tc pa3">
				<?php the_sub_field( 'card_text' ); ?>
				</div>
			</a>
		<?php
			endwhile;
		endif;
		?>
		</div>
	</section>
	<!-- BUEN PROVECHO -->
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<div class="mw8 flex flex-column items-center w-100 ba b--blue bw1 pa3 pa4-sm pa5-md">
			<div class="absolute top--2">
				<h2 class="flex flex-column ma0 beatrice-display ttu bg-near-white ph3 tc">
					<span class="f-36 blue">Buen</span>
					<span class="f-48 blue">Provecho</span>
				</h2>
			</div>
			<?php
			$mid_image = get_field( 'mid_image' );
			$mid_description = get_field( 'mid_description' );
			$paragraphs = explode( '//', $mid_description );
			?>
			<img src="<?php echo esc_url( $mid_image['sizes']['large'] ); ?>" alt="" class="filter mt4 mt5-sm mb4 mb5-sm">
			<?php foreach( $paragraphs as $paragraph ) : ?>
			<p class="f-16 dark-gray tc measure lh-copy"><?php echo $paragraph; ?></p>
			<?php endforeach; ?>
			<img src="<?php echo get_theme_file_uri( '/images/logo/cherries.svg' ); ?>" alt="" class="mt3 mt4-sm">
		</div>
	</section>
	<!-- BARBETTA -->
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<i class="f-16 tc">En Belmonte las noches son de</i>
		<?php
		$barbetta_image = get_field( 'barbetta_image' );
		$barbetta_link = get_field( 'barbetta_link' );
		$barbetta_logo = get_field( 'barbetta_logo' );
		if ( $barbetta_logo ) :
		?>
		<span class="mt2 mb0"><?php echo $barbetta_logo; ?></span>
		<?php
		else :
		?>
		<h1 class="beatrice-display ttu f-96 mt2 mb0 tc blue">Barbetta</h1>
		<?php
		endif;
		?>
		<img class="w-100 mt3 filter" src="<?php echo esc_url( $barbetta_image['sizes']['large'] ); ?>" alt="">
		<div class="w-100 flex flex-column flex-row-sm justify-between items-center">
			<p class="f-16 mt3 mt4-sm mb0 dark-gray lh-copy measure-narrow measure-md tc tl-sm "><?php the_field( 'barbetta_text' ); ?></p>
			<a href="<?php echo esc_url( $barbetta_link['url'] ); ?>" class="absolute-sm top--2-sm right--2-lg right--1-sm flex flex-column items-center justify-center flex-shrink-0 circle-link br-100 beatrice ttu bg-blue near-white pointer grow ph2 mt0-sm mt3 no-underline">
				<span class="tc f-14 mt2 mt3-sm"><?php echo $barbetta_link['title']; ?></span>
				<i class="icon-size dim cover mt1" style="background:url('<?php echo get_theme_file_uri( '/images/icons/arrow-forward.svg' ); ?>')"></i>
			</a>
		</div>
	</section>
	<!-- SITIO -->
	<?php
	if ( have_rows( 'sections_cards' ) ) :
		$sections_counter = 0;
		while ( have_rows( 'sections_cards' ) ) : 
			the_row();
			$sections_counter++;

			$card_image = get_sub_field( 'card_image' );
			$card_link = get_sub_field( 'card_link' );
			$card_logo = get_sub_field( 'card_logo' );
	?>
	<section class="flex flex-wrap items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<div class="w-100 w-50-md<?php if ( $sections_counter % 2 == 0 ) echo ' order-1-md'; ?>">
			<div class="aspect-ratio aspect-ratio--1x1-xxl aspect-ratio--5x7-lg aspect-ratio--3x4-md aspect-ratio--16x9">
				<div class="aspect-ratio--object cover filter" style="background:url('<?php echo esc_url( $card_image['sizes']['large'] ); ?>') center;"></div>
			</div>
		</div>
		<div class="w-100 w-50-md flex flex-column items-center justify-center mt4 mt5-sm mt0-md<?php if ( $sections_counter % 2 == 0 ) echo ' order-0-md'; ?>">
			<h1 class="flex flex-column tc measure-narrow mw-none-lg w-75-lg ma0">
				<span class="f-24 beatrice ttu"><?php the_sub_field( 'card_subtitle' ); ?></span>
				<?php if ( $card_logo ) : ?>
				<span class="mt2"><?php echo $card_logo; ?></span>
				<?php else : ?>
				<span class="f-48 beatrice-display ttu blue mt2"><?php the_sub_field( 'card_title' ); ?></span>
				<?php endif; ?>
			</h1>
			<p class="f-16 dark-gray lh-copy tc measure-narrow mw-none-lg w-75-lg mt3 mt4-sm mb0"><?php the_sub_field( 'card_description' ); ?></p>
			<a href="<?php echo esc_url( $card_link['url'] ); ?>" class="mt3 mt4-sm pv3 ph4 ba bw1 f7 ttu b pointer dib no-underline" id="reservations-button">
				<span class="beatrice"><?php echo $card_link['title']; ?></span>
			</a>
		</div>
	</section>
	<?php
		endwhile;
	endif;
	?>
	
	<?php include('inc/block-footer.php'); ?>

</div>

<?php include('inc/block-navbar.php'); ?>

<?php get_footer(); ?>

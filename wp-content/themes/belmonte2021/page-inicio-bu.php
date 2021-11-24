<!-- Page: Inicio -->
<?php get_header(); ?>

<?php include('inc/block-nav-menu.php'); ?>

<?php include('inc/block-sidebar.php'); ?>

<div class="content order-2">
	<section class="vh-100--nav flex flex-column pv3 pv4-sm pv5-xxl ph3 ph4-sm ph0-lg gap3">
		<div class="flex justify-between items-center">
			<div class="flex flex-column">
				<span class="ttu f-16">Jue / Dom – 3PM / 8PM</span>
				<h1 class="f-96 ttu beatrice-display lh-solid mt2 mb0 blue">
					Hora Feliz
				</h1>
			</div>
			<a class="flex flex-column items-center justify-center flex-shrink-0 circle-link br-100 beatrice ttu bg-blue near-white pointer grow ph2">
				<span class="tc f-14 mt2 mt3-sm">Conoce nuestras bebidas</span>
				<i class="icon-size dim cover mt1" style="background:url('<?php echo get_theme_file_uri( '/images/icons/arrow-forward.svg' ); ?>')" href=""></i>
			</a>
		</div>
		<div class="h-100 cover filter" style="background: url('<?php echo get_theme_file_uri( '/images/hero/happy-hour.jpg' ); ?>') center"></div>
	</section>
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<h1 class="beatrice-display ttu f-48 ma0 tc blue">De día, tarde y noche</h1>
		<p class="f-16 tc measure-narrow lh-copy dark-gray mt3 mb0">
			Ven y disfruta de deliciosos platillos y bebidas durante todo el día en Café Belmonte.
		</p>
		<div class="w-100 flex flex-nowrap-md flex-row-md flex-column items-center gap4-xl gap3 mt4">
			<a href="<?php echo get_site_url(); ?>/menu" class="w-third-md w-100 pointer no-underline link bg-animate hover-bg-blue hover-near-white z-0">
				<div class="aspect-ratio aspect-ratio--5x7-lg aspect-ratio--5x8-md aspect-ratio--16x9">
					<div class="aspect-ratio--object cover filter-hover" style="background:url('<?php echo get_theme_file_uri( '/images/home/am-menu.jpg' ); ?>') center;"></div>
				</div>
				<div class="beatrice ttu f-14 tc pa3">
					Menú AM
				</div>
			</a>
			<a href="<?php echo get_site_url(); ?>/menu" class="w-third-md w-100 pointer no-underline link bg-animate hover-bg-blue hover-near-white z-0">
				<div class="aspect-ratio aspect-ratio--5x7-lg aspect-ratio--5x8-md aspect-ratio--16x9">
					<div class="aspect-ratio--object cover filter-hover" style="background:url('<?php echo get_theme_file_uri( '/images/home/pm-menu.jpg' ); ?>') center;"></div>
				</div>
				<div class="beatrice ttu f-14 tc pa3">
					Menú PM
				</div>
			</a>
			<a href="<?php echo get_site_url(); ?>/menu" class="w-third-md w-100 pointer no-underline link bg-animate hover-bg-blue hover-near-white z-0">
				<div class="aspect-ratio aspect-ratio--5x7-lg aspect-ratio--5x8-md aspect-ratio--16x9">
					<div class="aspect-ratio--object cover filter-hover" style="background:url('<?php echo get_theme_file_uri( '/images/home/bar-menu.jpg' ); ?>') center;"></div>
				</div>
				<div class="beatrice ttu f-14 tc pa3">
					Menú de Bar
				</div>
			</a>
		</div>
	</section>
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<div class="mw8 flex flex-column items-center w-100 ba b--blue bw1 pa3 pa4-sm pa5-md">
			<div class="absolute top--2">
				<h2 class="flex flex-column ma0 beatrice-display ttu bg-near-white ph3 tc">
					<span class="f-36 blue">Buen</span>
					<span class="f-48 blue">Provecho</span>
				</h2>
			</div>
			<img src="<?php echo get_theme_file_uri( '/images/home/belmonte-3.jpg' ); ?>" alt="" class="filter mt4 mt5-sm">
			<p class="f-16 dark-gray tc measure lh-copy mt4 mt5-sm">Personas, colores y aromas pasean con libertad en el corazón de este barrio donde los sonidos de ciudad se convierten en sinfonías ¿Qué nos identifica? ¿Cuál es nuestra esencia? El amor por los recuerdos de nuestro orígen.</p>
			<p class="f-16 dark-gray tc measure lh-copy">El amor por los espacios que generan memorias y por las memorias que generan identidad. Bienvenido a Belmonte, un homenaje sensorial a nuestro Bello Monterrey. Lugar en donde el sabor se confunde con la nostalgia y la luz del cielo colma nuestros corazones.</p>
			<img src="<?php echo get_theme_file_uri( '/images/logo/cherries.svg' ); ?>" alt="" class="mt3 mt4-sm">
		</div>
	</section>
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<i class="f-16 tc">En Belmonte las noches son de</i>
		<h1 class="beatrice-display ttu f-96 mt2 mb0 tc blue">Barbetta</h1>
		<img class="w-100 mt3 filter" src="<?php echo get_theme_file_uri( '/images/home/barbetta.jpg' ); ?>" alt="">
		<div class="w-100 flex flex-column flex-row-sm justify-between items-center">
			<p class="f-16 mt3 mt4-sm mb0 dark-gray lh-copy measure-narrow measure-md tc tl-sm ">Ven a disfrutar con nosotros. En Belmonte, las noches son de Barbetta, vino, pizza y viniles.</p>
			<a class="absolute-sm top--2-sm right--2-lg right--1-sm flex flex-column items-center justify-center flex-shrink-0 circle-link br-100 beatrice ttu bg-blue near-white pointer grow ph2 mt0-sm mt3">
				<span class="tc f-14 mt2 mt3-sm">Conoce sobre Barbetta</span>
				<i class="icon-size dim cover mt1" style="background:url('<?php echo get_theme_file_uri( '/images/icons/arrow-forward.svg' ); ?>')" href=""></i>
			</a>
		</div>
	</section>
	<section class="flex flex-wrap items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
			<div class="w-100 w-50-md">
				<div class="aspect-ratio aspect-ratio--1x1-xxl aspect-ratio--5x7-lg aspect-ratio--3x4-md aspect-ratio--16x9">
					<div class="aspect-ratio--object cover filter" style="background:url('<?php echo get_theme_file_uri( '/images/home/impresso.jpg' ); ?>') center;"></div>
				</div>
			</div>
			<div class="w-100 w-50-md flex flex-column items-center justify-center mt4 mt5-sm mt0-md">
				<h1 class="flex flex-column tc measure-narrow mw-none-lg w-75-lg ma0">
					<span class="f-24 beatrice ttu">Presentamos:</span>
					<span class="f-48 beatrice-display ttu blue mt2">Impresso</span>
				</h1>
				<p class="f-16 dark-gray lh-copy tc measure-narrow mw-none-lg w-75-lg mt3 mt4-sm mb0">
					Publicación independiente dedicada a la cultura del noreste del país. Publicada trimestralmente, a la venta en Café Belmonte.</p>
				<a class="mt3 mt4-sm pv3 ph4 ba bw1 f7 ttu b pointer dib" id="reservations-button">
					<span class="beatrice">Conoce más</span>
				</a>
			</button>
		</div>
	</section>
	<section class="flex flex-wrap items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<div class="w-100 w-50-md order-1-md">
			<div class="aspect-ratio aspect-ratio--1x1-xxl aspect-ratio--5x7-lg aspect-ratio--3x4-md aspect-ratio--16x9">
				<div class="aspect-ratio--object cover filter" style="background:url('<?php echo get_theme_file_uri( '/images/home/lolyta.jpg' ); ?>') center;"></div>
			</div>
		</div>
		<div class="w-100 w-50-md flex flex-column items-center justify-center mt4 mt5-sm mt0-md order-0-md">
			<h1 class="flex flex-column tc measure-narrow mw-none-lg w-75-lg ma0">
				<span class="f-24 beatrice ttu">Edificio</span>
				<span class="f-48 beatrice-display ttu blue mt2">Lolyta</span>
			</h1>
			<p class="f-16 dark-gray lh-copy tc measure-narrow mw-none-lg w-75-lg mt3 mt4-sm mb0">
				Homenaje a los fundadores de Monterrey y patrimonio arquitectónico regiomontano en proceso de cobrar nueva vida bajo el sello de la marca Belmonte.</p>
			<a class="mt3 mt4-sm pv3 ph4 ba bw1 f7 ttu b pointer dib">
				<span class="beatrice">Conoce más</span>
			</a>
		</div>
	</section>
	
	<?php include('inc/block-footer.php'); ?>

</div>

<?php include('inc/block-navbar.php'); ?>

<?php get_footer(); ?>

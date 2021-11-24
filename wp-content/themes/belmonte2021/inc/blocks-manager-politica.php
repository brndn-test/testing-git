<?php include('block-nav-menu.php'); ?>

<?php include('block-sidebar.php'); ?>

<div class="content order-2">
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pt4 pt5-sm">
		<h1 class="f-48 ma0 tc"><?php the_title(); ?></h1>
	</section>
	<section class="flex flex-column items-center ph3 ph4-sm ph0-lg pv4 pv5-sm">
		<div class="f-16"><?php the_field( 'editor_content' ); ?></div>
	</section>
	
	<?php include('block-footer.php'); ?>

</div>

<?php include('block-navbar.php'); ?>
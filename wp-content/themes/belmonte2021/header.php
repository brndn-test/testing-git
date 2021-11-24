<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- 
	<script async src="https://www.googletagmanager.com/gtag/js?id=site-id"></script> 
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'site-id');
	</script>
	-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_theme_file_uri( '/images/favicon.png' ); ?>"/>
	<title><?php echo is_page( 'barbetta' ) ? 'Barbetta' : 'Belmonte'; ?><?php if ( !is_front_page() && !is_page( 'barbetta' ) ) echo ' | ' . get_the_title(); ?></title>
	<?php wp_head();
	$post_type_global = get_post_type( get_the_ID() );  ?>
</head>

<body>
	<div class="grain"></div>

	<?php if ( !is_page( 'barbetta' ) ) : ?>
	<!-- loader -->
	<?php include('inc/block-loader.php'); ?>

	<main class="<?php echo is_page( 'landing' ) ? 'flex flex-column vh-100 marquee-container' : 'layout gap4-lg'; ?>">
	<?php endif; ?>

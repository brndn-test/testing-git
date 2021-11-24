<?php

get_header();?>

<?php
	if ( in_category('pabellones-temporales') ) { 
	    get_template_part( 'inc/cat', 'pabellones-temporales' ); 

	} elseif ( in_category('xx-concurso-calli-profesional') ) {
	    get_template_part( 'inc/cat', 'xx-concurso-calli-profesional' );

	} elseif ( in_category('pabellon-bienal') ) {
	    get_template_part( 'inc/cat', 'pabellon-bienal' );

	} elseif ( in_category('vi-concurso-calli-estudiantil') ) {
	    get_template_part( 'inc/cat', 'vi-concurso-calli-estudiantil' );

	}
?>


<?php get_footer(); ?>

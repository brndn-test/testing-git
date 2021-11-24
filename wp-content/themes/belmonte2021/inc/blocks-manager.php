<?php
if( have_rows('flexible_content') ):
	$count = 0;
	$count2 = 0;
	while ( have_rows('flexible_content') ) : the_row();
		$acf_loop_count .= $count;
		$acf_loop_count2 .= $count2;
		if( get_row_layout() == 'tabs_titles_block' ): ?>

			<?php if( have_rows('title_parent') ): ?>
				<section class="pt-md-5 pb-5 pt-4">
					<div class="container w-100">
						<div class="row pl-md-4 p-0 pr-md-4 pr-0">
							<div class="col-12 pt-5 pb-4">
								<p class="c-white NeuLeon-Mono text-uppercase">Selecciona una convocatoria:</p>
							</div>
						</div>
						<ul class="row tab-menu w-100 pl-md-4 p-0 pr-md-4 pr-0">
							<?php while( have_rows('title_parent') ) : the_row();?>
								<li class="col-md-3 col-12 pl-0">
									<a href="#tab-<?php echo $acf_loop_count2++; ?>0" class="txt32 NeuLeon-Light">
										<?php the_sub_field('name');?>
									</a>
								</li>
							<?php endwhile;?>
						</ul>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif( get_row_layout() == 'tabs_block' ): ?>

			<section class="has-tab-content bg-F0F0F0">
				<div class="container tab-content is-home" id="tab-<?php echo $acf_loop_count++; ?>">
						<?php if( have_rows('sections_parent') ): ?>
							<?php while( have_rows('sections_parent') ) : the_row();?>
								<?php if( have_rows('subsections_parent') ): ?>
									<!-- Tab navigation -->
									<div class="slider-nav has-slider pl-md-4 p-0 pr-md-4 pr-0">
										<?php while( have_rows('subsections_parent') ) : the_row(); ?>
											<div class="bg-gray col-auto">
												<p class="NeuLeon-Mono c-dark-gray">
													<?php the_sub_field('title_subsection'); ?>
												</p>
											</div>
										<?php endwhile;?>
									</div>
								<?php endif;?>
								<div class="row" style="position: absolute;bottom: 20px;width: 90%;z-index: 9;margin: 0 auto;left: 0;right: 0;">
									<?php if(get_sub_field('pdf')) : ?>
									<div class="col-auto mt-auto">
										<p><a href="<?php the_sub_field('pdf'); ?>" target="_blank" class="NeuLeon-Mono c-white text-uppercase txt14"><i class="fas fa-arrow-down mr-2"></i>Descargar ficha de inscripción</a></p>
									</div>
									<?php endif; ?>
									<!-- MODAL -->
									<?php  if( get_sub_field('email') == 'callixxi@' ) { ?>
										<!-- Button trigger modal -->
<!-- 										<div class="col-auto mt-auto ml-md-auto">
											
											<button class="btn-rect bg-black c-white text-uppercase NeuLeon-Mono txt14 d-block border-0" data-toggle="modal" data-target="#exampleModalCenter">Inscribirse</button>
										</div> -->
									
									<?php } else if( get_sub_field('email') == 'callivii@' ) { ?>
										<!-- Button trigger modal -->
<!-- 										<div class="col-auto mt-auto ml-md-auto">
											<a href="mailto:callivii@bienalnuevoleon.com" class="btn-rect bg-black c-white text-uppercase NeuLeon-Mono txt14 d-block">Inscribirse</a>
										</div> -->
									<?php } ?>
									<!-- MODAL ENDS -->
								</div>
							<?php endwhile;?>
						<?php endif; ?>
					<?php get_template_part('inc/bl', 'tabs_slider'); ?>
				</div>
			</section>


		<?php endif; ?>


	<?php endwhile;
endif; ?>

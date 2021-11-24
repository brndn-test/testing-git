<style media="screen">
.slick-dots, button.slick-arrow {display: none!important;}
body.modalActive .modal-backdrop.show{ opacity: 0.5; display: block;}
body.modalActive.modal-open{ overflow: hidden;}
body.modalActive .modal{ pointer-events: all; display: block;}
body .modal-backdrop.show{ opacity: 0; display: none;}
body.modalHide .modal{ pointer-events: none; display: none!important;}
body.modal-open{ overflow: inherit;}
</style>

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
						<ul class="row tab-menu w-100">
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

			<section class="has-tab-content custom-page bg-F0F0F0">
				<div class="container tab-content is-home" id="tab-<?php echo $acf_loop_count++; ?>">
						<?php if( have_rows('sections_parent') ): ?>
							<?php while( have_rows('sections_parent') ) : the_row();?>
								<?php if( have_rows('subsections_parent') ): ?>
									<!-- Tab navigation -->
									<div class="slider-nav has-slider">
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
								</div>
							<?php endwhile;?>
						<?php endif; ?>

						<?php if( have_rows('sections_parent') ): ?>
							<?php while( have_rows('sections_parent') ) : the_row();?>
								<?php if( have_rows('subsections_parent') ): ?>
									<!-- Tab Content 2 -->
									<div class="slider-for has-slider mt-1">
									<?php while( have_rows('subsections_parent') ) : the_row(); ?>

											<div class="row has-content-white-links">
												<div class="col-12">
													<div class="d-flex flex-wrap bg-white c-black pt-5 pb-5 min-h610 no-gutters">
														<div class="col-12">
															<?php if(get_sub_field('title_header')) { ?>
																<p class="NeuLeon-Light txt32 mb-5 text-uppercase"><?php the_sub_field('title_header'); ?></p>
															<?php } ?>
															<div class="is-one-third pr-4 mb-md-0 mb-3 txt14">
																<?php the_sub_field('st_col'); ?>
															</div>
															<div class="is-one-third pr-4 mb-md-0 mb-3 txt14">
																<?php the_sub_field('nd_col'); ?>
															</div>
															<div class="is-one-third pr-4 mb-md-0 mb-3 txt14">
																<?php the_sub_field('tr_col'); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
									<?php endwhile;?>
									</div>
								<?php endif;?>
							<?php endwhile;?>
						<?php endif; ?>
				</div>
			</section>


		<?php elseif( get_row_layout() == 'related_page' ): ?>
			<!-- Modal -->
			<div class="modal" id="exampleModalHome" tabindex="-1" aria-labelledby="exampleModalHome"  aria-hidden="false">
				<div class="modal-dialog modal-lg mt-0" style="max-width: 650px; margin: 0 0 0 auto;">
					<div class="modal-content bg-white vh-100 NeuLeon-Mono rounded-0 p-0">
						<div class="modal-body p-0">
							<!-- TODOS #4 -->

							<?php
							$page = get_sub_field('page');

							query_posts(array('post_type' => 'page', 'p' => $page));
							while(have_posts())  {
							$this_page = the_post(); ?>
								<?php
								if( have_rows('flexible_content') ):
								    while ( have_rows('flexible_content') ) : the_row();

								        if( get_row_layout() == 'tabs_block' ): ?>
											<?php if( have_rows('sections_parent') ): ?>
												<?php while( have_rows('sections_parent') ) : the_row();?>
													<?php if( have_rows('subsections_parent') ): ?>
														<!-- Tab navigation -->
														<div class="slider-nav has-slider">
															<?php while( have_rows('subsections_parent') ) : the_row(); ?>
																<div class="bg-gray col-auto modal-nav">
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
													</div>
												<?php endwhile;?>
											<?php endif; ?>

											<?php if( have_rows('sections_parent') ): ?>
												<?php while( have_rows('sections_parent') ) : the_row();?>
													<?php if( have_rows('subsections_parent') ): ?>
														<div class="row">
															<!-- Tab Content 2 -->
															<div class="slider-for has-slider mt-1 col-md-10 pl-5">
															<?php while( have_rows('subsections_parent') ) : the_row(); ?>

																	<div class="row has-content-white-links">
																		<div class="col-12">
																			<div class="d-flex flex-wrap bg-white c-black min-h610">
																				<div class="col-12">
																					<p class="NeuLeon-Light txt32 mb-5 text-uppercase"><?php the_sub_field('title_header'); ?></p>
																					<div class="w-100 pr-4 mb-md-0 mb-3 txt14">
																						<?php the_sub_field('st_col'); ?>
																					</div>
																					<div class="w-100 pr-4 mb-md-0 mb-3 txt14">
																						<?php the_sub_field('nd_col'); ?>
																					</div>
																					<div class="w-100 pr-4 mb-md-0 mb-3 txt14">
																						<?php the_sub_field('tr_col'); ?>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
															<?php endwhile;?>
															</div>
															<div class="col-md-2">
																<button type="button" class="close p-5" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true" class="btn-close d-block"></span>
																</button>
															</div>
														</div>

													<?php endif;?>
												<?php endwhile;?>
											<?php endif; ?>

								        <?php endif;
								    endwhile;
								endif; ?>

							<?php } ?>


						</div>
					</div>
				</div>
			</div>



		<?php endif; ?>


	<?php endwhile;
endif; ?>

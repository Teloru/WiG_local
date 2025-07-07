<?php /* Template Name: Template ressources */ ?>
<?php
get_header();

$search = new WP_Advanced_Search('myformRes'); 
?>
<!-- Ceci est la page ressources -->
<div id="main-content" class="main-ressources ressources_list">
<div class="et_pb_section et_pb_inner_shadow intro et_pb_with_background et_section_regular">
	
			<div class=" et_pb_row et_pb_row_1 et_pb_gutters4">
				<div class="et_pb_column et_pb_column_1  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough">
				
				
				<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_justified  et_pb_text_1">
				
				
				<div class="et_pb_text_inner">
					<p style="text-align: center;">Vous trouverez sur cette page des guides et chartes utiles, ainsi que des articles de fond, des vidéos et des podcasts. Vous y trouverez aussi des contacts utiles et des ressources sur la diversité, l’inclusion et le féminisme.	</p>
					<p style="text-align: center">Vous avez envie de voir apparaître ici des informations sur un sujet particulier ?</p>
				</div> <!-- .et_pb_text -->
			</div> <!-- .et_pb_column -->
			</div>
			<div class=" et_pb_row et_pb_row_2">
				<div class="et_pb_column et_pb_column_4_4  et_pb_column_3 et_pb_css_mix_blend_mode_passthrough et-last-child">
				<div class="et_pb_button_module_wrapper et_pb_module et_pb_button_alignment_center">
				<a class="et_pb_button et_pb_custom_button_icon  et_pb_button_0 et_pb_module et_pb_bg_layout_dark" href="mailto:ressources@wigfr.org" data-icon="5">Faites-le nous savoir !</a>
			</div>
			</div> <!-- .et_pb_column -->
				
				
			</div>
			</div>
			</div>
	<div class="container">
		<div id="content-area" class="clearfix">
		
			<div id="left-area" class="grid80">
			<h1>L'essentiel</h1>
			<div class="essentiel-ressources fullGrid">
			<?php 
			$posts = get_posts( array(
					'post_type' => 'ressources',
					'posts_per_page'=>3, 
					'meta_query' => array(
						array(
							'key'   => 'a_la_une',
							'value' => '1',
						)	
					)
				) 
			);

			if( $posts ) {
				foreach( $posts as $post ) {
			?>
				<div class="grid33">
				<?php if( get_field('a_la_une') ) {
					
					} ?>
					<article>
						<a href="<?php the_permalink();?>">
							<?php if ( has_post_thumbnail() ) {	?>
								<?php the_post_thumbnail( 'et-pb-post-main-image', array('itemprop'=>'image') ); ?>
							<?php } else {?>
								<div class="noimage">no image</div>
							<?php } ?>	
							<h2 class="the-title"><?php the_title() ;?></h2>
							<div class="main-summary"><?php truncate_post( 150 ); ?></div>
						</a>
						<?php
							$the_terms = get_the_term_list( get_the_id(), 'categories-ressources', __( "Catégorie(s) :" ) . "<ul><li>", "</li>, <li>", "</li></ul>" );
						?>
						<div class="terms-ressources">
							<?php echo $the_terms; ?>
						</div>
					</article>
				</div>

				<?php
					}
				}
				wp_reset_postdata();
			?>
			</div>
		<div class="et_pb_row" id="advanced-form">
				<?php $search->the_form(); ?>
		</div>	

			<?php 
			$posts = get_posts( array(
					'post_type' => 'ressources',
					'meta_query' => array(
						array(
							'key'   => 'larticle_du_moment',
							'value' => '1'
						)	
					)
				) 
			);

			if( $posts ) {
				foreach( $posts as $post ) {
			?>
				<?php if( get_field('larticle_du_moment') ) {
				
					} ?>
					<article class="fullGrid"> 
						<div class="grid60">
						<a href="<?php the_permalink();?>">	 
							<?php if ( has_post_thumbnail() ) {	?>
								<?php the_post_thumbnail( 'full', array('itemprop'=>'image') ); ?>
							<?php } else {?>
								<div class="noimage"></div>
							<?php } ?>	
						</a>
						</div>
						<div class="grid40">
							<div class="content-bloc">
								<a href="<?php the_permalink();?>">
									<h2 class="the-title">><?php the_title() ;?></h2>
									<div class="main-summary"><?php truncate_post( 150 ); ?></div>
								</a>	
								<?php
									$the_terms = get_the_term_list( get_the_id(), 'categories-ressources', __( "Catégorie(s) :" ) . "<ul><li>", "</li>, <li>", "</li></ul>" );
								?>
								<div class="terms-ressources">
									<?php echo $the_terms; ?>
								</div>
							</div>
						</div>
					</article>
				
				<?php
					}
				}
				wp_reset_postdata();
			?>
			<div class="essentiel-ressources">
				<div class="all-ressources">		
					<h2 class="title-section">L'ensemble des ressources</h2>	
					<div id="wpas-results"></div>
				</div>	
			</div>
			</div> <!-- #left-area -->

					<div id="sidebar" class="grid20">
					<div class="et_pb_widget widget_categories">
							<h4>Catégories</h4>						
							<?php
							$args = array( 'hide_empty=0' );
							$terms = get_terms( 'categories-ressources', $args );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								$count = count( $terms );
								$i = 0;
								$term_list = '<ul class="my_term-archive">';
								foreach ( $terms as $term ) {
									$i++;
									$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a></li>';
								}	
								$term_list .= '</ul>';
								echo $term_list;
							} ?>
						</div>
						<div class="et_pb_widget widget_categories">
							<h4>Formats</h4>						
							<?php
							$args = array( 'hide_empty=0' );
							$terms = get_terms( 'categories-formats', $args );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								$count = count( $terms );
								$i = 0;
								$term_list = '<ul class="my_term-archive">';
								foreach ( $terms as $term ) {
									$i++;
									$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a></li>';
								}
								$term_list .= '</ul>';
								echo $term_list;
							} ?>
						</div>
					</div>
					</div> <!-- #content-area -->
				</div> <!-- .container -->
			</div> <!-- #main-content -->


<?php get_footer(); ?>
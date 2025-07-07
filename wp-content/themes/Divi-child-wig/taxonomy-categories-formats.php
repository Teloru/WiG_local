<?php
/*
 * Template de ressources liste
 *
 * @author: Stéphanie Vachon | @vachon_steph
 * @link http://www.velvetcocoon.com
 * @package vcTheme
 * @since 1.0
 * @version 1.0
 */
get_header();
$tax = $wp_query->get_queried_object();
?>
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
		
			<div id="left-area">
			<h1>Ressources dans la catégorie : <?php echo $tax->name; ?></h1>
			<?php
			query_posts(array(
				'post_type'=> 'ressources',
				'taxonomy' => 'categories-formats',
				'tax_query' => array(
					array(
						'taxonomy' => 'categories-formats',
						'field' => 'name',
						'terms' => $tax->name,
					)
				)		
			)); ?>



			<div class="essentiel-ressources">
				<div class="all-ressources">		
					
				<?php if ( have_posts() ) : ?>


				<?php 

				while ( have_posts() ) : the_post();  ?>
				<div class="grid33">

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
				<?php endwhile; 
				?>
				<?php endif; ?>
				</div>	
			</div>
			</div> <!-- #left-area -->

					<div id="sidebar">
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
									if( $tax->name == $term->name) {
										$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) .'" class="current-cat">' . $term->name . '</a></li>';
									} else {
										$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) .'">' . $term->name . '</a></li>';
									}
								
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
									if( $tax->name == $term->name) {
										$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) .'" class="current-cat">' . $term->name . '</a></li>';
									} else {
										$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) .'">' . $term->name . '</a></li>';
									}	
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
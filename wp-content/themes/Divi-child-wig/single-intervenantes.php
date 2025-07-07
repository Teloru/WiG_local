<?php get_header();?>
<div id="main-content">
	<article class="page type-page status-publish hentry intervenantes_list" role="article" itemscope itemtype="http://schema.org/Article">
		<div class="entry-content">
			<div class="et_pb_section et_pb_inner_shadow intro et_pb_with_background et_section_regular">
			<h1>Liste d’expertes et intervenantes</h1>
			<div class=" et_pb_row et_pb_row_1 et_pb_gutters4">
				<div class="et_pb_column et_pb_column_1_2  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough">
				
				
				<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_justified  et_pb_text_1">
				
				
				<div class="et_pb_text_inner">
					<p style="text-align: center;"><strong>Vous organisez un événement ?</strong></p>
<p class="">Vous cherchez une intervenante pour votre conférence, table ronde, plateau TV, interview, témoignage, ou pour une master class ? Contactez nous, nous avons un réseau grandissant de professionnelles expertes dans leur domaines et partantes pour partager leur expérience.</p>
				</div>
			</div> <!-- .et_pb_text -->
			</div> <!-- .et_pb_column --><div class="et_pb_column et_pb_column_1_2  et_pb_column_2 et_pb_css_mix_blend_mode_passthrough et-last-child">
				
				
				<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_justified  et_pb_text_2">
				
				
				<div class="et_pb_text_inner">
					<p style="text-align: center;"><strong>Professionnelle du jeu vidéo ?</strong></p>
<p class="">Vous avez envie de partager votre expertise en intervenant sur des événements, tables rondes ou master class ? Rejoignez-nous pour bénéficier de conseils, de formations à la prise de parole, et être mise en contact avec les organisateurs d’événements.</p>
				</div>
			</div> <!-- .et_pb_text -->
			</div> <!-- .et_pb_column -->
				
				
			</div>
			<div class=" et_pb_row et_pb_row_2">
				<div class="et_pb_column et_pb_column_4_4  et_pb_column_3 et_pb_css_mix_blend_mode_passthrough et-last-child">
				
				
				<div class="et_pb_button_module_wrapper et_pb_module et_pb_button_alignment_center">
					<a class="et_pb_button et_pb_custom_button_icon  et_pb_button_0 et_pb_module et_pb_bg_layout_dark" href="/intervenantes/" data-icon="5">Voir la liste des intervenantes</a>
				</div>
			</div> <!-- .et_pb_column -->
				
				
			</div>
			</div>
			<?php if ( have_posts() ) : ?>

	<div class="intervenantes">
		<div class="et_pb_row">
		<div class="fullGrid">
		<?php 
		$i = 1;
		while ( have_posts() ) : the_post();  ?>
		<?php if($i % 3 == 0) { ?>
			<div class="grid33">
		<?php } else { ?>
			<div class="grid33">
		<?php  } ?>	
		<?php //echo $i; ?>
				<div class="et_pb_module et_pb_team_member team_member_thumb et_pb_bg_layout_light clearfix et_pb_with_border">
					<div class="et_pb_team_member_image et-waypoint et_pb_animation_off">
					<?php 
					$image = get_field('photo');
					//var_dump ($image);
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
					?>
					</div>
					<h4><?php the_title();?> 
					<?php if(get_field('pronom')) {?>
						(<?php the_field('pronom');?>)
					<?php } ?>
					</h4>
					<div class="et_pb_member_position">

					<?php
                	// $terms = get_the_terms( get_the_ID(), 'metiers' );
              		// if ($terms) {
					// //$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));	  
					// $i = 1;
                    // foreach($terms as $term) {
					//   $metier = get_field('relMetiers', $term); 
					//   if( !empty($metier) ) { 
					?>
					<!--	<a href="<?php echo $metier;?>"><?php echo $term->name;?></a>-->
					<?php 
					//  echo ($i < count($terms))? " / " : "";
					//  $i++;	
					// } else { 
					// 	echo $term->name; 
					// 	}
					// } 
					// echo ($i < count($terms))? " / " : "";
					// 	$i++;
					// } // echo strip_tags (get_the_term_list( get_the_ID(), 'metiers', "",", " ));?>
					<?php the_field('entreprise');?></div>
					<?php the_content();?>
						<ul class="et_pb_member_social_links">
						<?php if(get_field('facebook')){?>	
						<li>
							<a  class="et_pb_font_icon et_pb_facebook_icon" href='<?php the_field('facebook');?>'><span>facebook</span></a>
						</li>
						<?php } 
						if(get_field('twitter')){?>	
						<li>
							<a  class="et_pb_font_icon et_pb_twitter_icon" href='<?php the_field('twitter');?>'><span>twitter</span></a>
						</li>
						<?php }  
						if(get_field('linkedin')) {?>	
						<li>
							<a href="<?php the_field('linkedin');?>" class="et_pb_font_icon et_pb_linkedin_icon"><span>Linkedin</span>
							</a>
						</li>
						<?php } ?>
						</ul>	
				</div>
			</div>
		<?php $i++; endwhile; 
		?>
		</div>
	</div>
	</div>
<?php endif; ?>
        </div>
	</article>
</div>

<?php get_footer(); ?>

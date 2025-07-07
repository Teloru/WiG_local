
<?php if ( have_posts() ) : ?>

	<div class="intervenantes">
		<div class="et_pb_row">
		<div class="fullGrid">
		<?php 
	
		while ( have_posts() ) : the_post();  ?>

		<div class="grid25">
	
				<div class="et_pb_module et_pb_team_member team_member_thumb et_pb_bg_layout_light clearfix et_pb_with_border">
					<div class="et_pb_team_member_image et-waypoint et_pb_animation_off">
					<?php if(get_field('photo')){
						$image = get_field('photo');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
							echo wp_get_attachment_image( $image, $size );
						?>	
					<?php } else { ?>
						<img src="https://womeningamesfrance.org/wp-content/uploads/2020/09/blank-profile-picture-973460_640-e1600926377389.png" class="attachment-full size-full" alt="" width="300" height="300">
					<?php } ?>		
			
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

					<div class="dept"> 
						<?php 
							echo strip_tags (get_the_term_list( get_the_ID(), 'dept', "Dept / ville : ",", " ));
						?>
					</div>
						<ul class="et_pb_member_social_links">
						<?php if(get_field('linkedin')){?>	
						<li>
							<a  class="et_pb_font_icon et_pb_linkedin_icon" href='<?php the_field('linkedin');?>'><span>linkedin</span></a>
						</li>
						<?php } 
						if(get_field('twitter')){?>	
						<li>
							<a  class="et_pb_font_icon et_pb_twitter_icon" href='<?php the_field('twitter');?>'><span>twitter</span></a>
						</li>
						<?php }  
						if(get_field('linkedin')) {?>	
						<li>
							<a href="<?php the_field('facebook');?>" class="et_pb_font_icon et_pb_facebook_icon"><span>facebook</span>
							</a>
						</li>
						<?php } 
						if(get_field('instagram')) {?>	
						<li>
						<a href="<?php the_field('instagram');?>" class="et_pb_font_icon"><i class="fab fa-instagram"><span>Instagram</span></i>
							</a>
						</li>
						<?php }  
						if(get_field('twitch')) {?>	
						<li>
							<a href="<?php the_field('twitch');?>" class="et_pb_font_icon"><i class="fab fa-twitch"><span>Twitch</span></i>
							</a>
						</li>
						<?php }  
						if(get_field('web')) {?>	
						<li>
							<a href="<?php the_field('web');?>" class="et_pb_font_icon"><i class="dashicons dashicons-admin-site-alt3"><span>www</span></i>
							</a>
						</li>
						<?php } ?>
						</ul>	
				</div>
			</div>
		<?php endwhile; 
		?>
		</div>
	</div>
	</div>
<?php endif; ?>
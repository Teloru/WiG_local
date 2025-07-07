
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
<?php
/*
Template Name: Faculty Page
*/


get_header(); ?>

<div id="main">

		<div id="primary">
		
			<div id="content" class="fullWidth facultyList" role="main">
			<header class="entry-header">
				<h1 class="entry-title">Faculty Profiles</h1>
			</header>
			

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>
					
					<?php $args = array( 'post_type' => 'faculty', 'posts_per_page' => 20, 'orderby' => 'title', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
						<div class="faculty cf">
							
							
								<div class="personPhoto">
    			
								<a href="<?php the_permalink(); ?>">
    				
				    				<?php 

$image = get_field('picture');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>				
								</a>
				    		</div>
				    		
				<div class="text">
    			
    			<div class="titleheading">
    			<h3><a href="<?php the_permalink(); ?>"><?php the_field('name'); ?></a></h3>
    			<!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->
				
    			
    			
    			
    				<div class="contactInfo">
    			
	    				<div class="officeLocation">
	    					<?php the_field('affiliations'); ?>
	    				</div>
	    				
	    				<div class="officePhone">
	    					<?php the_field('phone_number'); ?>
	    				</div>
	    				
	    				<div class="officeEmail">
	    					<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
	    				</div>
	    				
	    				<div class="expertise">
	    					<?php the_field('expertise'); ?>
	    				</div>
	    				
	    				<div>
		    				<?php the_field('relationship_to_facility'); ?>
	    				</div>
    				</div>
	    		
    			</div>
    			
    			
    			
    			
    			    			
					
					
    		</div>
    		
    		
								
								
								
								
								
							
						</div>
					<?php endwhile; ?>

				<?php endwhile; // end of the loop. ?>
				
		</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>
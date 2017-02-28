<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage CALSv1
 */

get_header(); ?>


 



  <div id="main2">

  		<div class="timelineToolbar">
	  		<div class="timelineInner">
		  		<a href="#" class="futureEvents"><span><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M384,352l96-109.3h-66.1C407.1,141.8,325,64,223.2,64C117.8,64,32,150.1,32,256s85.8,192,191.2,192  c43.1,0,83.8-14.1,117.7-40.7l7.5-5.9l-43.2-46.2l-6.2,4.6c-22.1,16.3-48.3,24.9-75.8,24.9C152.6,384.7,95.1,327,95.1,256  c0-71,57.5-128.7,128.1-128.7c66.4,0,120.7,50,127.4,115.3h-74.1L384,352z"/></svg></span> Show Future Events</a>
		  		
		  		<div class="searchInput">
			  		<span><svg enable-background="new 0 0 512 512" height="512px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M497.913,497.913c-18.782,18.782-49.225,18.782-68.008,0l-84.862-84.863c-34.889,22.382-76.13,35.717-120.659,35.717  C100.469,448.767,0,348.312,0,224.383S100.469,0,224.384,0c123.931,0,224.384,100.452,224.384,224.383  c0,44.514-13.352,85.771-35.718,120.676l84.863,84.863C516.695,448.704,516.695,479.131,497.913,497.913z M224.384,64.109  c-88.511,0-160.274,71.747-160.274,160.273c0,88.526,71.764,160.274,160.274,160.274c88.525,0,160.273-71.748,160.273-160.274  C384.657,135.856,312.909,64.109,224.384,64.109z"/></svg></span>
		  			<input id="input-16" type="text" placeholder="Search Timeline Events">
		  		</div>
	  		</div>
	  		
  		</div>

		<div id="primary">
		
		<div id="content" role="main">
			
			<h1 class="whisperText">Timeline</h1>
			
			<div class="timeline">
				<span class="today"><div class="timelinestartdate"><?php echo date("l F jS, Y"); ?></div><div class="timelinefuturedate">2019</div></span>
				<span class="end"></span>
			</div>
			
			<div class="timelineEntries cf">
				
				<?php	// get posts
$posts = get_posts(array(
	'post_type'			=> 'post',
	'posts_per_page'	=> -1,
	'meta_key'			=> 'date_of_event',
	'orderby'			=> 'meta_value_num',
	'order'				=> 'DESC'
)); ?>

			<?php if ( $posts ) : ?>

				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php foreach( $posts as $post ): 
		
		setup_postdata( $post ) ?>
					<?php $date = DateTime::createFromFormat('Ymd', get_field('date_of_event'));
						
						if($date) {
							$todaysDate = date("Ymd");
							$compareFormat = $date->format('Ymd');
							
							
						}
						 ?>
					<div class="singletimelineentry <?php if($todaysDate < $compareFormat) { echo "future futureHidden"; } else { echo "past"; } ?>">
						
						
						<div class="timelinecontent">
							<div class="imageCrop">
							<?php

	    				if ( has_post_thumbnail() ) {

		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');

		    				} else {

							 //echo '<img src="';
							 echo catch_that_image();
							// echo '" alt="" />';

						}

    				?>
							</div>
							
    					<div class="textContent">
							
							<span class="date"><?php 
								

								if($date) {
									echo $date->format('D, M d Y');
								}
					
								 ?></span>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt_rss(); ?></p>
						</div>
						
						</div>
						
						<span class="dot"></span>
					</div>
				<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				
				
				
				
			</div>
		
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

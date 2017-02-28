<?php
/**
 * The template for displaying content in the single.php template
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="facultyImage">
		<?php 

$image = get_field('picture');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>	
		</div>
		<div class="facultyMainInfo">
			
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<div><?php the_field('affiliations'); ?></div>
		<div><?php the_field('education'); ?></div>
		<div><?php the_field('expertise'); ?></div>

<div class="contactInfo">
    			
	    				<div class="officePhone">
	    					<a href="<?php the_field('website'); ?>">Website</a>
	    				</div>
	    				
	    				<div class="officePhone">
	    					<?php the_field('phone_number'); ?>
	    				</div>
	    				
	    				<div class="officeEmail">
	    					<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
	    				</div>
	    				
	    				
	    				
	    				<p>
		    				<?php the_field('relationship_to_facility'); ?>
	    				</p>
    				</div>
		</div>
		<div class="clear"></div>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php twentyeleven_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content <?php the_field('bio_format'); ?>">
		<?php the_content(); ?>
		
		
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<div class="publicationsContainer" style="display: none;" >
		<h3>Publications</h3>
		<div class="publicationsCheck">
			<?php the_field('publications'); ?>
		</div>
	</div>

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			/*printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);*/
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

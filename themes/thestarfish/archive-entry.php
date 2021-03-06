<?php
/**
 * Template Name: Entry Archive
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php 



$post_page_id = get_option( 'page_for_posts' );

$post_page_banner = (CFS()->get('banner_image', $post_page_id)); 

?>

		<?php if ( have_posts() ) : ?>

			<header class="entry-header" style="background: url(<?php echo $post_page_banner; ?>); width: 100%; height: 600px; background-size: cover; ">
				<?php single_post_title( '<h1 class="entry-title">', '</h1>' ); ?>	
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header><!-- .entry-header -->
	
      <?php

			the_archive_title();

				$args = array( 'post_type' => array ('post', 'entry') );
				$myposts = get_posts($args);

        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
     
          <h2></h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php 
					
					if ( has_post_thumbnail() ) {
							the_post_thumbnail('medium');
					}

					the_excerpt(); ?>
  
        <?php endforeach; 
        	wp_reset_postdata();?>
      
		<?php endif; ?>


		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header class="content-box-header">
				<h2>Want to contribute to our Journal and get your story published?</h2>
			</header><!-- .content-box-header -->

			<div class="content-box-content">
				<a class="content-box-button" href="<?php echo esc_url(get_permalink(get_page_by_path( 'submit' ) ) ); ?>">Add your voice
					<span class="screen-reader-text"><?php echo esc_html( 'Add your voice' ); ?></span>
				</a><!-- .content-box-button -->
			</div><!-- .content-box-content -->
		</section><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_template_part( 'template-parts/content', 'donation' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

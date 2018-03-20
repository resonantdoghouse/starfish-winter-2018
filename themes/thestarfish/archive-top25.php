<?php
/**
 * Template Name: Top 25
 *
 * @package starfish_Theme
 */

get_header(); ?>
	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class='entry-header'>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					
				</header>
				
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>


<section class="editorial-team">
		<?php
			$args = array( 
				'posts_per_page' => 25, 
				'offset'=> 1, 
				'post_type' => 'profile', 
				'profile_type' => 'nominees',
			);
			$myposts = get_posts( $args );
			?>
		<?php 
		foreach ( $myposts as $post ) : setup_postdata( $post );
		if ( has_post_thumbnail() ) : 
		?>
			<div class="editorial-container">
		<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
    <li>
        <a class="profile-picture" href="<?php the_permalink(); ?>" id="<?php echo $post->ID; ?>"><?php the_title(); ?></a>
	</li>
	</div>
<?php endforeach;
wp_reset_postdata();
?>
</section>







		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
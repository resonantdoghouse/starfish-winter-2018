<?php
/**
 * Template Name: Team Page
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

		</main><!-- #main -->



<!-- EXECUTIVE TEAM -->

<section class="profile-box">
<div class="profile-box-preview">
	<p>Test</p>
</div>
<div class="profile-container">
	<div class="profile-headline">
		<h1>Executive Team</h1>
		<p>We are a volunteer run organization working closely together to celebrate and amplify the Canadian youth conservation movement.</p>
	</div>
		<?php
			$args = array( 
				'posts_per_page' => 12, 
				'offset'=> 1, 
				'post_type' => 'profile', 
				'profile_type' => 'executive team',
			);
			$myposts = get_posts( $args );
			?>
		<?php 
		foreach ( $myposts as $post ) : setup_postdata( $post );
		if ( has_post_thumbnail() ) : 
		?>
			<div class="profile-content">
		<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
    <li>
        <a class="profile-picture" href="<?php the_permalink(); ?>" id="<?php echo $post->ID; ?>"><?php the_title(); ?></a>
		</li>
		<a href="<?php echo esc_url(get_permalink(get_page_by_path( 'learn more' ) ) ); ?>">Learn More</a>
	</div>
<?php endforeach;
wp_reset_postdata();
?>
</div>
</section>

<!-- EDITORIAL TEAM -->

<section class="profile-box editorial">

<div class="profile-box-preview">
	<p>Test</p>
</div>

<div class="profile-container">
	<div class="profile-headline">
		<h1>Editorial Team</h1>
		<p>We are a volunteer run organization working closely together to celebrate and amplify the Canadian youth conservation movement.</p>
	</div>

		<?php
			$args = array( 
				'posts_per_page' => 12, 
				'offset'=> 1, 
				'post_type' => 'profile', 
				'profile_type' => 'editorial team',
			);
			$myposts = get_posts( $args );
			?>
		<?php 
		foreach ( $myposts as $post ) : setup_postdata( $post );
		if ( has_post_thumbnail() ) : 
		?>
			<div class="profile-content">
		<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
    <li>
        <a class="profile-picture" href="<?php the_permalink(); ?>" id="<?php echo $post->ID; ?>"><?php the_title(); ?></a>
		</li>
		<a href="<?php echo esc_url(get_permalink(get_page_by_path( 'learn more' ) ) ); ?>">Learn More</a>

	</div>
	<?php endforeach;
	wp_reset_postdata();
	?>
</div>
</section>

<!-- BOARD DIRECTORS -->

<section class="profile-box">

<div class="profile-box-preview">
	<p>Test</p>
</div>

<div class="profile-container">
	<div class="profile-headline">
	<h1>Board Directors</h1>
	<p>We are a volunteer run organization working closely together to celebrate and amplify the Canadian youth conservation movement.</p>
			</div>
			<?php
				$args = array( 
					'posts_per_page' => 8, 
					'offset'=> 1, 
					'post_type' => 'profile', 
					'profile_type' => 'board directors',
				);
				$myposts = get_posts( $args );
				?>
			<?php 
			foreach ( $myposts as $post ) : setup_postdata( $post );
			if ( has_post_thumbnail() ) : 
			?>
				<div class="profile-content">
			<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>
		<li>
			<a class="profile-picture" href="<?php the_permalink(); ?>" id="<?php echo $post->ID; ?>"><?php the_title(); ?></a>
			</li>
			<a href="<?php echo esc_url(get_permalink(get_page_by_path( 'learn more' ) ) ); ?>">Learn More</a>
		</div>
	<?php endforeach;
	wp_reset_postdata();
	?>
</div>
</section>










	</div><!-- #primary -->
<?php get_template_part( 'template-parts/content', 'donation' ); ?>
<?php get_footer(); ?>
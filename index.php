<?php 
	$wp = get_theme_mod('is_wp');
	$wp_text = get_theme_mod('wp_text');

	if($wp){ 
		
		?>
			<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
			<head>
				<meta charset="<?php bloginfo( 'charset' ); ?>">
				<meta name="viewport" content="width=device-width">
				<link rel="profile" href="http://gmpg.org/xfn/11">
				<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">

				<?php wp_head(); ?>
			</head>
			<body <?php body_class( 'bg-white text-zinc-900 antialiased' ); ?>>

				<div class="h-screen-header flex items-center justify-center">
					<h1 class="text-6xl font-black text-zinc-800 relative">
						<?php echo $wp_text == "" ? "Sito in lavorazione" : $wp_text ?>
					</h1>
				</div>
			</body>
			</html>
<?php
		exit();
	}
?>

<?php get_header(); ?>

<div class="container mx-auto my-8">

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
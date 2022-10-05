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

<?php do_action( 'tailword_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col ">

	<?php do_action( 'tailword_header' ); ?>

	<header class="mx-2 h-[10em]">

		<div class="mx-auto container">
			<div class="flex justify-between items-center py-6">
				<div class="flex justify-between items-center">

					<div class="lg:max-w-md md:w-!md w-44 ml-3 flex justify-center">
						<?php if ( has_custom_logo() ) { ?>
                            <?php the_custom_logo(); ?>
						<?php } else { ?>
							<div class="text-lg uppercase ">
								<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
									<?php echo get_bloginfo( 'name' ); ?>
								</a>
							</div>

							<p class="text-sm font-light text-zinc-600 ">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div>

					<div class="sr-only">spacer</div>
					
					<div>

						<?php	

							$default_anchor_class = '
								w-full rounded
								lg:px-2 p-2
								hover:bg-zinc-300
							';

							$default_anchor_class_0 = '
								flex relative flex-row items-center justify-between
								hover:bg-zinc-300

								w-full rounded
								lg:px-2 p-2
								
								lg:w-auto 

								mx-4 lg:mx-5
								lg:hover:bg-transparent
								lg:hover:text-[#53af32]
							';

							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_id'    => 'primary-menu' ,
									'fallback_cb'     => false,

									'container_class' => 'hidden lg:block',
									
									'menu_class'      => '
										
										flex flex-col lg:flex-row justify-center items-center 
										w-[90%] py-2 mx-auto rounded 
										border border-zinc-200 lg:border-0 dark:border-zinc-600
										
										bg-zinc-50  
										
										lg:bg-transparent
									',
									
									'li_class_0'       => '
										lg:w-auto w-full flex relative
									',
										
									'li_class'         => '
										w-full flex relative
										rounded
										',
										
									'anchor_class_0'   => $default_anchor_class_0,
									'anchor_class'     => $default_anchor_class,
									'submenu_class'    => '
										hidden
										top-[2.5em] text-center absolute z-40 w-44
										rounded shadow dark:shadow-zinc-900
										bg-white dark:bg-zinc-600
									',
									
									'active_link'      =>"
										$default_anchor_class
										text-white bg-[#53af32]
									",

									'active_link_0'    => "
										$default_anchor_class_0
										lg:text-[#53af32] lg: 
										lg:bg-transparent text-white bg-[#53af32]
										text-white bg-[#53af32]
									",
									

								)
							);
						?>
					</div>

					
					<div class="lg:hidden block">

						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
						
							<button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-neutral-800 rounded-lg lg:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200 ">
								<span class="sr-only">Open main menu</span>
								<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
									 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
										<g id="icon-shape">
											<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
												  id="Combined-Shape"></path>
										</g>
									</g>
								</svg>
							</button>
						</a>
					</div>
				</div>		
			</div>
		</div>
	
	</header>

	<div id="content" class="site-content flex-grow mx-3">

		<?php do_action( 'tailword_content_start' ); ?>

		<main>

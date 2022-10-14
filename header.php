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

<body <?php body_class( 'bg-white text-zinc-900 antialiased !overflow-x-hidden' ); ?>>

<?php do_action( 'tailword_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailword_header' ); ?>

	<header class="select-none z-50">

		<div class="mx-4 lg:ml-10 lg:mr-20">
			<div class="lg:flex lg:justify-between lg:items-center pb-6">
				<div class="flex justify-between items-center">
					<div class="md:max-w-[15rem] max-w-[10rem] my-3">
						<?php if ( has_custom_logo() ) {
                            the_custom_logo();
						} else { ?>
							<div class="text-lg uppercase m-2">
								<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
									<?php echo get_bloginfo( 'name' ); ?>
								</a>
							</div>

							<p class="text-sm font-light text-zinc-600 ">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div>
					
					<div aria-label="Toggle navigation" class="lg:hidden block my-2" id="primary-menu-toggle">
						<button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-neutral-800 rounded-lg lg:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200 ">
							<span class="sr-only">Open main menu</span>
							<svg viewBox="0 0 20 20" class="inline-block w-8 h-8" version="1.1"
									xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</button>
					</div>
				</div>

				<?php	

					$default_anchor_class = '
						w-full
						lg:px-2 p-2
						hover:bg-zinc-300 py-3
					';

					$default_anchor_class_0 = '
						flex relative flex-row items-center justify-between
						hover:bg-zinc-300

						w-full rounded
						lg:px-2 p-3
						
						lg:w-auto 
						lg:hover:underline

						lg:mx-5
						lg:hover:bg-transparent
					';

					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_id'    => 'primary-menu' ,
							'fallback_cb'     => false,

							'container_class' => 'hidden lg:block',
							
							'menu_class'      => '
								text-zinc-500

								font-medium	

								uppercase
								
								flex flex-col lg:flex-row justify-center items-center 
								w-[90%] py-4 mx-auto rounded-xl
								border lg:border-0 border-zinc-300
								bg-zinc-50 px-4
								lg:bg-transparent
								my-2
							',
							
							'li_class_0'       => '
								lg:w-auto w-full flex relative shrink-0
							',
								
							'li_class'         => '
								w-full flex relative
								flex-col
								rounded',
								
							'anchor_class_0'   => $default_anchor_class_0,
							'anchor_class'     => $default_anchor_class,
							'submenu_class'    => '	
								flex flex-col
								inset-x-0 mx-auto
								hidden

								overflow-hidden

								top-[3.5rem] lg:my-0 my-1 text-center lg:absolute z-40 w-full
								
								border border-zinc-200 		
								shadow rounded-xl bg-white
							',
							
							'active_link'      =>"
								$default_anchor_class
								!text-black 
								!font-black
							",

							'active_link_0'    => "
								$default_anchor_class_0
								!text-black 
								!font-black 
							",							

						)
					);
				?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content grow mx-3">

		<?php do_action( 'tailword_content_start' ); ?>

		<main>

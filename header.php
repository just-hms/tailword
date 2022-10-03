<?php 

	$phone = get_theme_mod('telephone');
	$email = get_theme_mod('email');
	$location = get_theme_mod('location');
	$location_link = get_theme_mod('location_link');
	
	$show_info = $phone !== "" || $email !== "" || $location !== "";

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

<?php do_action( 'tailword_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col dark:bg-zinc-900 dark:text-zinc-100">

	<?php do_action( 'tailword_header' ); ?>

	<header class="dark:bg-zinc-800">

		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center py-6">
				<div class="flex justify-between items-baseline">
					<div class="hidden lg:block lg:max-w-md md:w-md ml-3 flex justify-center">
						<?php if ( has_custom_logo() ) { ?>
                            <?php the_custom_logo(); ?>
						<?php } else { ?>
							<div class="text-lg uppercase dark:text-zinc-50">
								<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
									<?php echo get_bloginfo( 'name' ); ?>
								</a>
							</div>

							<p class="text-sm font-light text-zinc-600 dark:text-zinc-100">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>

						<?php } ?>
					</div>

					<!-- info_dropdown -->
					<?php if($show_info) { ?>
						<div class="lg:hidden relative">
							
							<button id="info_drop_btn" data-info_dropdown-toggle="info_dropdown" class="flex items-center mx-2 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-600 focus:outline-none focus:ring-4 focus:ring-zinc-200 dark:focus:ring-zinc-600 rounded-lg text-sm p-2.5" type="button">
								<div class="flex flex-col">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="mx-auto bi bi-info-circle-fill" viewBox="0 0 16 16">
										<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
									</svg>
									<small>Contatti</small>
								</div>
								<div>
									<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
								</div>
							</button>
		
							<div 
								id="info_dropdown" 
								class="absolute top-[3.5em] hidden z-40 bg-white rounded shadow-lg dark:bg-zinc-800 dark:shadow-zinc-900" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
							>
								<ul class="py-1 text-sm text-zinc-700 mx-5 dark:text-zinc-200" aria-labelledby="info_drop_btn">
									
									<li class="flex items-center my-2">
										<?php if ($phone != "") { ?> 
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 block text-zinc-600 dark:text-zinc-400" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
											</svg>

											<a href="tel:<?php echo $phone; ?>" class="mr-6 text-sm font-medium text-zinc-500 dark:text-white hover:underline"><?php echo $phone; ?></a>
											
										<?php } ?>
									</li>
		
									<hr class="my-3 border-zinc-200 lg:mx-auto dark:border-zinc-600">
		
									<li class="flex items-center my-2">
										<?php if ($email != "") { ?> 
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 block text-zinc-600 dark:text-zinc-400" viewBox="0 0 16 16">
												<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
											</svg>

											<a href="mailto: <?php echo $email; ?>" class="mr-6 text-sm font-medium text-zinc-500 dark:text-white hover:underline"><?php echo $email; ?></a>

										<?php } ?>
									</li>
		
									<hr class="my-3 border-zinc-200 lg:mx-auto dark:border-zinc-600">
									
									<li class="flex items-center my-2">
										<?php if ($location != "") { ?> 
											<svg class="mx-2 block text-zinc-600 dark:text-zinc-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
												<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
											</svg>

											<?php if ($location_link != "") { ?>
												<a class="mr-6 text-sm font-medium text-zinc-500 dark:text-white hover:underline" href="<?php echo $location_link; ?>"><?php echo $location; ?></a>
											<?php } else {?>
												<p class="mr-6 text-sm font-medium text-zinc-500 dark:text-white"><?php echo $location; ?></p>
											<?php }?>  
												
										<?php } ?>
									</li>
								</ul>
							</div>
							
						</div>
					<?php } ?>

					<div class="lg:hidden block w-[60%]">&nbsp;</div>
											
					<div>
						<button type="button" class="theme-toggle mx-2 lg:hidden block text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-600 focus:outline-none focus:ring-4 focus:ring-zinc-200 dark:focus:ring-zinc-600 rounded-lg text-sm p-2.5">
							<svg class="theme-toggle-dark-icon hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
							<svg class="theme-toggle-light-icon hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
						</button>
					</div>


					<div class="lg:hidden">

						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
						
							<button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-neutral-800 rounded-lg lg:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:ring-neutral-600" aria-controls="navbar-sticky" aria-expanded="false">
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
				
				<div class="items-center lg:flex hidden shrink-0">
					
					<?php if ($phone != "") { ?> 
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 block text-zinc-600 dark:text-zinc-400" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
						</svg>

						<a href="tel:<?php echo $phone; ?>" class="mr-6 text-sm font-medium text-zinc-500 dark:text-white hover:underline"><?php echo $phone; ?></a>
						
					<?php } ?>

					<?php if ($email != "") { ?> 
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-2 block text-zinc-600 dark:text-zinc-400" viewBox="0 0 16 16">
							<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
						</svg>

						<a href="mailto: <?php echo $email; ?>" class="mr-6 text-sm font-medium text-zinc-500 dark:text-white hover:underline"><?php echo $email; ?></a>

					<?php } ?>

					<?php if ($location != "") { ?> 
						<svg class="mx-2 block text-zinc-600 dark:text-zinc-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
							<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
						</svg>

						<?php if ($location_link != "") { ?>
							<a class="mr-6 text-sm font-medium text-zinc-500 dark:text-white hover:underline" href="<?php echo $location_link; ?>"><?php echo $location; ?></a>
						<?php } else {?>
							<p class="mr-6 text-sm font-medium text-zinc-500 dark:text-white"><?php echo $location; ?></p>
						<?php }?>  
							
					<?php } ?>

					<button type="button" class="theme-toggle mx-2 lg:block hidden text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-600 focus:outline-none focus:ring-4 focus:ring-zinc-200 dark:focus:ring-zinc-600 rounded-lg text-sm p-2.5">
						<svg class="theme-toggle-dark-icon hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
						<svg class="theme-toggle-light-icon hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
					</button>
				</div>
			</div>
		</div>
	
		<hr class="hidden lg:block my-3 border-zinc-300 lg:mx-auto dark:border-zinc-600">
		
		<div>

			<?php	

				$default_anchor_class = '
					w-full rounded
					lg:px-2 p-2
					hover:bg-zinc-300  dark:hover:bg-zinc-500
				';

				$default_anchor_class_0 = '
					flex relative flex-row items-center justify-between
					hover:bg-zinc-300  dark:hover:bg-zinc-500

					w-full rounded
					lg:px-2 p-2
					
					lg:w-auto 

					mx-4 lg:mx-5
					lg:hover:bg-transparent lg:dark:hover:bg-transparent
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
							
							bg-zinc-50 dark:bg-zinc-700 
							
							lg:bg-transparent lg:dark:bg-transparent 
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
							lg:text-[#53af32] lg:dark:text-[#53af32] 
			 				lg:bg-transparent text-white bg-[#53af32]
							text-white bg-[#53af32]
						",
						

					)
				);
			?>
		</div>

		<!-- logo on mobile -->
		<nav class="lg:hidden bg-white dark:bg-zinc-800 flex justify-center items-center">
			<div class="mx-auto w-3/4 max-w-md">
				<?php if ( has_custom_logo() ) { ?>
						<?php the_custom_logo(); ?>
					<?php } else { ?>
						<div class="text-center flex-1 text-lg uppercase dark:text-zinc-50">
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>
						</div>
		
						<p class="text-center flex-1 text-sm font-light dark:text-zinc-100 text-zinc-600">
							<?php echo get_bloginfo( 'description' ); ?>
						</p>		
					<?php } ?>
			</div>	
		</nav>
	
		<hr class="mt-3 border-zinc-200 lg:mx-auto dark:border-zinc-800">

	</header>

	<div id="content" class="site-content flex-grow mx-3">

		<?php do_action( 'tailword_content_start' ); ?>

		<main>

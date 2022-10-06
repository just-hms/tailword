
</main>

<?php do_action( 'tailword_content_end' ); ?>

</div>

<?php do_action( 'tailword_content_after' ); ?>


<footer class="p-4 bg-zinc-100 sm:p-6 ">

	<?php do_action( 'tailword_footer' ); ?>

    <div class="lg:flex lg:justify-between">
        <div class="mb-6 lg:mb-0 w-44">
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
				
		<?php 
			wp_nav_menu(
				array(
					'theme_location'  => 'secondary',
					'container_id'    => 'secondary-menu' ,
					'fallback_cb'     => false,

					'menu_class'      => '
						grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 
					',
					
					'li_class'         => 'w-44 font-normal',
						
					'anchor_class_0'   => 'font-bold text-gray-900  uppercase ',
					'anchor_class'     => 'hover:underline mb-2 ',
					'submenu_class'    => 'mt-6 static',
				)
			);
		?>

    </div>
	
</footer>


</div>

<?php wp_footer(); ?>

</body>
</html>


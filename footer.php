
</main>

<?php do_action( 'tailword_content_end' ); ?>

</div>

<?php do_action( 'tailword_content_after' ); ?>


<footer class="p-4 sm:p-6 select-none">

	<?php do_action( 'tailword_footer' ); ?>

    <div class="mb-6 flex justify-between items-center">
        <div class="w-44">
			
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
				
		<div class="container mx-auto text-center text-gray-500">
			&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
		</div>

		<div>&nbsp;</div>

    </div>
	
</footer>


</div>

<?php wp_footer(); ?>

</body>
</html>


<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shopay
 */

	if ( ! is_front_page() ) {
		echo '</div><!-- .mt-container -->';
	}
?>			
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php
			/**
			 * hook - shopay_footer_section
			 * 
			 * @hooked - shopay_footer_widget_area - 5
			 * @hooked - shopay_footer - 10
			 * 
			 */
			do_action( 'shopay_footer_section' );
		?>
	</footer><!-- #colophon -->

	<?php
		/**
		 * hook - shopay_after_footer
		 * 
		 * @hooked - shopay_scroll_to_top - 5
		 */
		do_action( 'shopay_after_footer' );
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	(function () {
    var menu = document.getElementById('search-bar-section'); // colocar em cache
	var nav = document.getElementById('site-navigation'); // colocar em cache
    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
			menu.classList.add('menuFixo'); // > 0 ou outro valor desejado	
			nav.classList.add('menuFixo'); // > 0 ou outro valor desejado	
		} 
        else {
			menu.classList.remove('menuFixo');
			nav.classList.remove('menuFixo'); // > 0 ou outro valor desejado	
		}
    });
})();
</script>
</body>
</html>
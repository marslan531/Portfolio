<?php $foliox_redux_demo = get_option('redux_demo');?>
	<?php if(isset($foliox_redux_demo['footer_text']) && $foliox_redux_demo['footer_text']!= ''){?>
	<div class="foliox_tm_section">
		<div class="foliox_tm_copyright">
			<div class="container">
				<p class="wow fadeInUp" data-wow-duration="1s"><?php echo wp_kses_post($foliox_redux_demo['footer_text']);?></p>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<!-- CURSOR -->
	<div class="mouse-cursor cursor-outer"></div>
	<div class="mouse-cursor cursor-inner"></div>
	<!-- /CURSOR -->
	
	<!-- TOTOP -->
	<div class="progressbar">
		<a href="#"><span class="text"><?php echo wp_kses_post($foliox_redux_demo['to_top_text']);?></span></a>
		<span class="line"></span>
	</div>
	<!-- /TOTOP -->
	
</div>
<!-- / WRAPPER ALL -->
<?php wp_footer(); ?>
</body>
</html>
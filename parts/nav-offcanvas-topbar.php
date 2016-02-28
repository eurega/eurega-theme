<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu">
      <li><a href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="EUREGA-Logo" style="width: 20%;" />
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/EUREGA-Schriftzug-blau.png" alt="EUREGA-Schriftzug" style="width: 43%;" />
			</a></li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>

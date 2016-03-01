<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<div data-sticky-container>
	<div id="title-bar-menu" class="title-bar" style="width: 100%" data-sticky data-top-anchor="eurega-header:bottom" data-btm-anchor="content:bottom" data-options="marginTop:0;" data-sticky-on="small">
		<div class="title-bar--logo-container">
			<div class="title-bar-left show-for-medium">
				<?php joints_top_nav(); ?>
			</div>
			<div class="title-bar-right show-for-small-only">
				<ul class="menu">
					 <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
				</ul>
			</div>
		</div>
	</div>
</div>

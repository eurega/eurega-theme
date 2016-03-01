<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<div data-sticky-container>
	<div class="title-bar" id="top-bar-menu" style="width: 100%" data-sticky data-top-anchor="eurega-header:bottom" data-btm-anchor="content:bottom" data-options="marginTop:0;">
		<div class="title-bar-right show-for-medium">
			<?php joints_top_nav(); ?>
		</div>
		<div class="title-bar-right show-for-small-only">
			<ul class="menu">
				 <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			</ul>
		</div>
	</div>
</div>

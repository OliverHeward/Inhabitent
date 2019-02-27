<div id="sb-search" class="header-search">
<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
	<fieldset>
		<a href="" class="search-toggle" aria-hidden="true">
			<i class="fas fa-search"></i> </a>
		<label>
			<input type="search" class="search-field" placeholder="TYPE AND HIT ENTER ..." value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="Search for:" />
		</label>
		<input type="submit" id="search-submit" class="screen-reader-text" value="Search">	<input id="search-submit" class="screen-reader-text" type="submit">
	</fieldset>
</form>


	<div class="header-search">
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<fieldset>
			<label>
				<i class="fas fa-search"></i>

				<input type="search" class="search-field" placeholder="SEARCH ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
			</label>
			
		</fieldset>
	</form>
</div>
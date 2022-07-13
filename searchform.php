<div class="search_form">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>">
		<fieldset>
		     <input name="post_type" type="hidden" value="post" />
            <?php $button = __('Cari berita..', 'wpmasjid'); ?>
			<input name="s" type="text" onfocus="if(this.value=='<?php echo $button; ?>') this.value='';" onblur="if(this.value=='') this.value='<?php echo $button; ?>';" value="<?php echo $button; ?>" />
			<button type="submit"></button>
		</fieldset>
	</form>
</div>

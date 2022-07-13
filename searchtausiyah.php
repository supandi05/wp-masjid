<div class="search_form tau">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>">
		<fieldset>
		     <input name="post_type" type="hidden" value="tausiyah" />
            <?php $button = __('Cari tausiyah..', 'wpmasjid'); ?>
			<input class="intau" name="s" type="text" onfocus="if(this.value=='<?php echo $button; ?>') this.value='';" onblur="if(this.value=='') this.value='<?php echo $button; ?>';" value="<?php echo $button; ?>" />
			<button type="submit" class="none"></button>
		</fieldset>
	</form>
</div>

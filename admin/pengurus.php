<?php 

// pengurus masjid pengaturan WP Masjid

?>

<!-- DATA PENGURUS MASJID -->
	<tr valign="top">
		<td class="tl"><label for="nama"><?php _e('PENGURUS', 'wp-masjid'); ?></label></td>
		<td colspan="2">Tambahkan daftar kepengurusan Masjid, hanya pengurus pokok yang datanya diinput melalui Pengaturan ini, sisanya masuk ke dalam daftar Lembaga yang di-input melalui pos Lembaga (Dasbor > Lembaga)</td>
	</tr>
	<tr valign="top">
		<td class="tl"><label for="nama"><?php _e('SHALAT', 'wp-masjid'); ?></label></td>
		<td colspan="2">
											    
			<script>
		    	jQuery(document).ready(function($){
		    		$('.photo_ketua').click(function() {
				    	var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
						jQuery(".custom_ketua").attr('src', attachment.url);
						$(button).prev().val(attachment.url);
						wp.media.editor.send.attachment = send_attachment_bkp;
						$('.custom_ketua, .kek').show();
						}
						wp.media.editor.open(button);
						return false;  
					});
					$(".kek").click(function(){
						$('#pketua').val('');
						$('.custom_ketua, .kek').hide();
					});
				});
			</script>
			<div class="clear">									
			<div class="pengurus">
				<label for="nama"><?php _e('KETUA', 'wp-masjid'); ?></label>
				<div class="peinn">
					<input type="text" placeholder="Nama..." name="naketua" id="naketua" class="widefat" value="<?php echo get_option('naketua'); ?>"/>
				</div>
				<div class="pekol">
					<?php if (get_option('pketua')) { ?>
						<span class="kek bl">x</span>
					<?php } else { ?>
						<span class="kek no">x</span>
					<?php } ?>
					<img class="custom_ketua" src="<?php echo get_option('pketua'); ?>"/><br/>
				</div>
				<div class="pekol">
					<input class="custom_media_url" id="pketua" type="hidden" name="pketua" value="<?php echo get_option('pketua'); ?>"> <a href="#" class="button photo_ketua custom_media_upload">Upload Foto</a><br/>
				</div>
			</div>
												
												
			<script>
		    	jQuery(document).ready(function($){
		    		$('.photo_wakil').click(function() {
				    	var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
						jQuery(".custom_wakil").attr('src', attachment.url);
						$(button).prev().val(attachment.url);
						wp.media.editor.send.attachment = send_attachment_bkp;
						$('.custom_wakil, .wak').show();
						}
						wp.media.editor.open(button);
						return false;  
					});
					$(".wak").click(function(){
						$('#pwakil').val('');
						$('.custom_wakil, .wak').hide();
					});
				});
			</script>
			
			<div class="pengurus">
			    <label for="nama"><?php _e('WAKIL', 'wp-masjid'); ?></label>
				<div class="peinn">
					<input type="text" placeholder="Nama..." name="nawakil" id="nawakil" class="widefat" value="<?php echo get_option('nawakil'); ?>"/>
				</div>
				<div class="pekol">
					<?php if (get_option('pwakil')) { ?>
			        	<span class="wak bl">x</span>
					<?php } else { ?>
			        	<span class="wak no">x</span>
					<?php } ?>
					<img class="custom_wakil" src="<?php echo get_option('pwakil'); ?>"/><br/>
				</div>
				<div class="pekol">
					<input class="custom_media_url" id="pwakil" type="hidden" name="pwakil" value="<?php echo get_option('pwakil'); ?>"> <a href="#" class="button photo_wakil custom_media_upload">Upload Foto</a><br/>
				</div>
			</div>
												
			<script>
		    	jQuery(document).ready(function($){
		    		$('.photo_seke').click(function() {
				    	var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
						jQuery(".custom_seke").attr('src', attachment.url);
						$(button).prev().val(attachment.url);
						wp.media.editor.send.attachment = send_attachment_bkp;
						$('.custom_seke, .sek').show();
						}
						wp.media.editor.open(button);
						return false;  
					});
					$(".sek").click(function(){
						$('#pseke').val('');
						$('.custom_seke, .sek').hide();
					});
				});
			</script>
			
			<div class="pengurus">
				<label for="nama"><?php _e('SEKRETARIS', 'wp-masjid'); ?></label>
				<div class="peinn">
					<input type="text" placeholder="Nama..." name="naseke" id="naseke" class="widefat" value="<?php echo get_option('naseke'); ?>"/>
				</div>
				<div class="pekol">
					<?php if (get_option('pseke')) { ?>
						<span class="sek bl">x</span>
					<?php } else { ?>
						<span class="sek no">x</span>
					<?php } ?>
					<img class="custom_seke" src="<?php echo get_option('pseke'); ?>"/><br/>
				</div>
				<div class="pekol">
					<input class="custom_media_url" id="pseke" type="hidden" name="pseke" value="<?php echo get_option('pseke'); ?>"> <a href="#" class="button photo_seke custom_media_upload">Upload Foto</a><br/>
				</div>
			</div>
												
			<script>
		    	jQuery(document).ready(function($){
		    		$('.photo_benda').click(function() {
				    	var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
						jQuery(".custom_benda").attr('src', attachment.url);
						$(button).prev().val(attachment.url);
						wp.media.editor.send.attachment = send_attachment_bkp;
						$('.custom_benda, .bek').show();
						}
						wp.media.editor.open(button);
						return false;  
					});
					$(".bek").click(function(){
						$('#pbenda').val('');
						$('.custom_benda, .bek').hide();
					});
				});
			</script>
			
			<div class="pengurus">
				<label for="nama"><?php _e('BENDAHARA', 'wp-masjid'); ?></label>
				<div class="peinn">
					<input type="text" placeholder="Nama..." name="nabenda" id="nabenda" class="widefat" value="<?php echo get_option('nabenda'); ?>"/>
				</div>
				<div class="pekol">
					<?php if (get_option('pbenda')) { ?>
						<span class="bek bl">x</span>
					<?php } else { ?>
						<span class="bek no">x</span>
					<?php } ?>
					<img class="custom_benda" src="<?php echo get_option('pbenda'); ?>"/><br/>
				</div>
				<div class="pekol">
					<input class="custom_media_url" id="pbenda" type="hidden" name="pbenda" value="<?php echo get_option('pbenda'); ?>"> <a href="#" class="button photo_benda custom_media_upload">Upload Foto</a><br/>
				</div>
			</div>
			</div>
			<div class="clear">
			<strong>KETERANGAN</strong> : Untuk photo pengurus, upload photo dengan bentuk persegi. Ukuran yang dianjurkan adalah 200x200 atau 300x300
			</div>
		</td>
	</tr>
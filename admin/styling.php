<?php 

// Logo, Icon, dan Style pengaturan WP Masjid

?>

    <script>
		    	jQuery(document).ready(function($){
		    		$('.blogos').click(function() {
				    	var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
						jQuery(".custom_logo").attr('src', attachment.url);
						$(button).prev().val(attachment.url);
						wp.media.editor.send.attachment = send_attachment_bkp;
						$('.custom_logo, .lek').show();
						}
						wp.media.editor.open(button);
						return false;  
					});
					$(".lek").click(function(){
						$('#logos').val('');
						$('.custom_logo, .lek').hide();
					});
					
					$('.favicons').click(function() {
				    	var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
						jQuery(".custom_favicon").attr('src', attachment.url);
						$(button).prev().val(attachment.url);
						wp.media.editor.send.attachment = send_attachment_bkp;
						$('.custom_favicon, .fak').show();
						}
						wp.media.editor.open(button);
						return false;  
					});
					$(".fak").click(function(){
						$('#favicon').val('');
						$('.custom_favicon, .fak').hide();
					});
				});
			</script>

	<tr>
		<td class="tl"><label>Ganti Logo</label></td>
    	<td>
	
         	<div class="pekol">
		    	<?php if (get_option('logos')) { ?>
		    		<span class="lek bl">x</span>
		    	<?php } else { ?>
		    		<span class="lek no">x</span>
		    	<?php } ?>
		    	<img class="custom_logo" src="<?php echo get_option('logos'); ?>"/><br/>
			</div>
	    	<div class="pekol">
			    <input class="custom_media_url" id="logos" type="hidden" name="logos" value="<?php echo get_option('logos'); ?>"> <a href="#" class="button blogos custom_media_upload">Upload Logo</a><br/>
			</div>
	
        	<span class="description"><strong>PENTING</strong> : Siapkan gambar logo 360x100 pixel atau skala kelipatannya. Gunakan gambar berformat <strong>PNG transparan</strong> (tembus pandang) atau gambar berformat JPG dengan background  serupa header</span>
			<br/><br/>
    	</td>
	</tr>
	
	<tr>
		<td class="tl"><label>Ganti Ikon Website</label></td>
    	<td>
	
         	<div class="pekol">
		    	<?php if (get_option('favicon')) { ?>
		    		<span class="fak bl">x</span>
		    	<?php } else { ?>
		    		<span class="fak no">x</span>
		    	<?php } ?>
		    	<img class="custom_favicon" src="<?php echo get_option('favicon'); ?>"/><br/>
			</div>
	    	<div class="pekol">
			    <input class="custom_media_url" id="favicon" type="hidden" name="favicon" value="<?php echo get_option('favicon'); ?>"> <a href="#" class="button favicons custom_media_upload">Upload Favicon</a><br/>
			</div>
	
        	<span class="description"><strong>PENTING</strong> : Untuk favicon (ikon header website) pergunakan gambar persegi dengan ukuran 1:1 (misal 64x64 pixel) dan format jpg, gif, atau png</span>
			<br/><br/>
    	</td>
	</tr>

	
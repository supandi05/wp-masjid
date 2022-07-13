<?php 

/*** POST TYPE JADWAL SHALAT ***/		

	register_post_type( 'jadwal-shalat',		
	array(			
	    'menu_icon' => 'dashicons-calendar-alt',
		'labels' => array(				
	    'name' => __( 'Jadwal Shalat' ),				
	    'singular_name' => __( 'Jadwal Shalat' ),        
	    'add_new' => __( 'Tambah Bulan + Tahun?' ),	
	    'add_new_item' => __( 'Tambah Bulan + Tahun' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Jadwal' ),	
	    'new_item' => __( 'Jadwal Baru' ),	
	    'view' => __( 'Lihat Jadwal' ),	
	    'view_item' => __( 'Lihat Jadwal' ),	
	    'search_items' => __( 'Cari Jadwal' ),	
	    'not_found' => __( 'Tidak ada Jadwal ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Jadwal di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title'),        			            
		'exclude_from_search' => false, 	 
		 )	
    );	
	
	add_action('admin_init', 'hhs_add_meta_boxes', 1);
	function hhs_add_meta_boxes() {
    	add_meta_box( 'repeatable-fields', 'Jadwal Waktu Shalat', 'hhs_repeatable_meta_box_display', 'jadwal-shalat', 'normal', 'default');
    }

	function hhs_repeatable_meta_box_display() {
    	global $post;
    	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
    	wp_nonce_field( 'hhs_repeatable_meta_box_nonce', 'hhs_repeatable_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
     	jQuery(document).ready(function( $ ){
    		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    	});
    	</script>
  
    	<table id="repeatable-fieldset-one">
		    <tr>
					<td colspan="7">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <strong style="color: #f33;">KETERANGAN</strong> : Pada bagian judul (lihat di atas) ketikkan nama bulan dilanjutkan dengan tahun. Misalkan : <em>Oktober 2017</em><br/>
									Untuk detail jadwal silahkan diisi melalui form dibawah ini dengan pengisian waktu gunakan format <em>01-01-2017</em> untuk tanggal dan <em>12:00</em> untuk jam<br/><br/>
								</div>
							</div>
						</div>
					</td>
			</tr>
		    <tr>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                TANGGAL
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                IMSYAK
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                SUBUH
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                DZUHUR
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                ASHAR
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                MAGHRIB
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                ISYA
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin" style="text-align: center;">
			    	                
								</div>
							</div>
						</div>
					</td>
			</tr>
			
         	<?php if ( $repeatable_fields ) :
			foreach ( $repeatable_fields as $field ) { ?>
             	<tr>
            		<td>
						    <div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Tanggal.." class="widefat" name="tanggals[]" value="<?php if($field['tanggals'] != '') echo esc_attr( $field['tanggals'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Imsyak" class="widefat" name="imsyaks[]" value="<?php if ($field['imsyaks'] != '') echo esc_attr( $field['imsyaks'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Subuh" class="widefat" name="subuhs[]" value="<?php if ($field['subuhs'] != '') echo esc_attr( $field['subuhs'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
						    <div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Dzuhur" class="widefat" name="dzuhurs[]" value="<?php if($field['dzuhurs'] != '') echo esc_attr( $field['dzuhurs'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Ashar" class="widefat" name="ashars[]" value="<?php if ($field['ashars'] != '') echo esc_attr( $field['ashars'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Maghrib" class="widefat" name="maghribs[]" value="<?php if ($field['maghribs'] != '') echo esc_attr( $field['maghribs'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				                	<input type="text" placeholder="Isya" class="widefat" name="isyas[]" value="<?php if ($field['isyas'] != '') echo esc_attr( $field['isyas'] ); ?>" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
		    	            		<a class="button button-primary remove-row" href="#">x</a>
								</div>
							</div>
					</td>
				</tr>
				
			<?php } else : ?>
			
	    		<tr>
            		<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	            	<input type="text" class="widefat" name="tanggals[]" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="imsyaks[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="subuhs[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
			    	            	<input type="text" class="widefat" name="dzuhurs[]" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="ashars[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="maghribs[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="isyas[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				    	            <a class="button button-primary remove-row" href="#">x</a>
								</div>
							</div>
					</td>
				</tr>
				
			<?php endif; ?>
	
            	<!-- empty hidden one for jQuery -->
            	<tr class="empty-row screen-reader-text">
            		<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	            	<input type="text" class="widefat" name="tanggals[]" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="imsyaks[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="subuhs[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
			    	            	<input type="text" class="widefat" name="dzuhurs[]" />
								</div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="ashars[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="maghribs[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
						        	<input type="text" class="widefat" name="isyas[]" />
							    </div>
							</div>
					</td>
					<td>
							<div class="half">
							    <div class="halfin">
				                	<a class="button button-primary remove-row" href="#">x</a>
								</div>
							</div>
					</td>
				</tr>
		</table>
		
		<div class="addnew"><strong>PENTING</strong> : <em>input tanggal harus berurutan</em><br/><br/>
		<a id="add-row" class="button button-primary button-large" href="#">Tambah Baru</a></div> 
			
	<?php
	
    }

	add_action('save_post', 'hhs_repeatable_meta_box_save');

	function hhs_repeatable_meta_box_save($post_id) {
    	if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce'], 'hhs_repeatable_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'repeatable_fields', true);
    	$new = array();
	
    	$tanggalss = $_POST['tanggals'];
    	$imsyakss = $_POST['imsyaks'];
		$subuhss = $_POST['subuhs'];
		$dzuhurss = $_POST['dzuhurs'];
    	$asharss = $_POST['ashars'];
		$maghribss = $_POST['maghribs'];
		$isyass = $_POST['isyas'];
	
    	$count = count( $tanggalss );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $tanggalss[$i] != '' ) {
	    		$new[$i]['tanggals'] = stripslashes( strip_tags( $tanggalss[$i] ) );
				$new[$i]['imsyaks'] = stripslashes( $imsyakss[$i] ); 
				$new[$i]['subuhs'] = stripslashes( $subuhss[$i] ); 
				$new[$i]['dzuhurs'] = stripslashes( $dzuhurss[$i] ); 
				$new[$i]['ashars'] = stripslashes( $asharss[$i] ); 
				$new[$i]['maghribs'] = stripslashes( $maghribss[$i] ); 
				$new[$i]['isyas'] = stripslashes( $isyass[$i] ); 
				
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'repeatable_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'repeatable_fields', $old );
	}
?>
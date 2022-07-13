<?php 

/*** POST TYPE JADWAL SHALAT ***/		

	register_post_type( 'ramadhan',		
	array(			
	    'menu_icon' => 'dashicons-calendar-alt',
		'labels' => array(				
	    'name' => __( 'Jadwal Ramadhan' ),				
	    'singular_name' => __( 'Jadwal Ramadhan' ),        
	    'add_new' => __( 'Tambah Tahun?' ),	
	    'add_new_item' => __( 'Tambah Tahun' ),	
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
	
	add_action('admin_init', 'ramadhan_meta_boxes', 1);
	function ramadhan_meta_boxes() {
    	add_meta_box( 'ramadhan-fields', 'Jadwal Ramadhan', 'hhs_ramadhan_meta_box_display', 'ramadhan', 'normal', 'default');
    }

	function hhs_ramadhan_meta_box_display() {
    	global $post;
    	$ramadhan_fields = get_post_meta($post->ID, 'ramadhan_fields', true);
    	wp_nonce_field( 'hhs_ramadhan_meta_box_nonce', 'hhs_ramadhan_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
     	jQuery(document).ready(function( $ ){
    		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#ramadhan-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    	});
    	</script>
		
		
  
    	<table id="ramadhan-fieldset-one">
		    <tr>
					<td colspan="7">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <strong style="color: #f33;">KETERANGAN</strong> : Pada bagian judul (lihat di atas) ketikkan Ramadhan dilanjutkan dengan tahun. Misalkan : <em>Ramadhan 1439</em><br/>
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
			    	                x
								</div>
							</div>
						</div>
					</td>
			</tr>
			
         	<?php if ( $ramadhan_fields ) :
			foreach ( $ramadhan_fields as $field ) { ?>
             	<tr>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <input type="text" placeholder="01-01-2017" class="tanggal widefat" name="tanggalr[]" value="<?php if($field['tanggalr'] != '') echo esc_attr( $field['tanggalr'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Imsyak" class="widefat" name="imsyakr[]" value="<?php if($field['imsyakr'] != '') echo esc_attr( $field['imsyakr'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Subuh" class="widefat" name="subuhr[]" value="<?php if($field['subuhr'] != '') echo esc_attr( $field['subuhr'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Dzuhur" class="widefat" name="dzuhurr[]" value="<?php if($field['dzuhurr'] != '') echo esc_attr( $field['dzuhurr'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Ashar" class="widefat" name="asharr[]" value="<?php if($field['asharr'] != '') echo esc_attr( $field['asharr'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Maghrib" class="widefat" name="maghribr[]" value="<?php if($field['maghribr'] != '') echo esc_attr( $field['maghribr'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Isya" class="widefat" name="isyar[]" value="<?php if($field['isyar'] != '') echo esc_attr( $field['isyar'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
				                	<a class="button remove-row" href="#">x</a>
								</div>
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
			    	                <input type="text" placeholder="01-01-2017" class="tanggalr widefat" name="tanggalr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="04:00" class="widefat" name="imsyakr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Subuh" class="widefat" name="subuhr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Dzuhur" class="widefat" name="dzuhurr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Ashar" class="widefat" name="asharr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Maghrib" class="widefat" name="maghribr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Isya" class="widefat" name="isyar[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
				                	<a class="button remove-row" href="#">x</a>
								</div>
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
			    	                <input type="text" placeholder="01-01-2017" class="widefat" name="tanggalr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Imsyak" class="widefat" name="imsyakr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Subuh" class="widefat" name="subuhr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Dzuhur" class="widefat" name="dzuhurr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Ashar" class="widefat" name="asharr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Maghrib" class="widefat" name="maghribr[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Isya" class="widefat" name="isyar[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
				                	<a class="button remove-row" href="#">x</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
		</table>
		
		<table>
		        <tr>
			        <td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin"><br/><a id="add-row" class="button button-primary button-large" href="#">+ Tanggal Baru</a></div> 
							</div>
						</div>
					</td>
				</tr>
		</table>
	
    	<?php
    }

	add_action('save_post', 'hhs_ramadhan_meta_box_save');

	function hhs_ramadhan_meta_box_save($post_id) {
    	if ( ! isset( $_POST['hhs_ramadhan_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['hhs_ramadhan_meta_box_nonce'], 'hhs_ramadhan_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'ramadhan_fields', true);
    	$new = array();
	
    	$jtanggalr = $_POST['tanggalr'];
    	$jimsyakr = $_POST['imsyakr'];
		$jsubuhr = $_POST['subuhr'];
		$jdzuhurr = $_POST['dzuhurr'];
		$jasharr = $_POST['asharr'];
		$jmaghribr = $_POST['maghribr'];
		$jisyar = $_POST['isyar'];
	
    	$count = count( $jtanggalr );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $jtanggalr[$i] != '' ) {
	    		$new[$i]['tanggalr'] = stripslashes( $jtanggalr[$i] );
		        $new[$i]['imsyakr'] = stripslashes( $jimsyakr[$i] ); 
				$new[$i]['subuhr'] = stripslashes( $jsubuhr[$i] ); 
				$new[$i]['dzuhurr'] = stripslashes( $jdzuhurr[$i] );
				$new[$i]['asharr'] = stripslashes( $jasharr[$i] );
				$new[$i]['maghribr'] = stripslashes( $jmaghribr[$i] );
				$new[$i]['isyar'] = stripslashes( $jisyar[$i] );
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'ramadhan_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'ramadhan_fields', $old );
	}
	
?>
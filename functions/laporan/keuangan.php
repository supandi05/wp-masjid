<?php 

/*** POST TYPE LAPORAN KEUANGAN ***/		

	register_post_type( 'laporan',		
	array(			
	    'menu_icon' => 'dashicons-list-view',
		'labels' => array(				
	    'name' => __( 'Lap Keuangan' ),				
	    'singular_name' => __( 'Lap Keuangan' ),        
	    'add_new' => __( 'Tambah Laporan' ),	
	    'add_new_item' => __( 'Tambah Laporan' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Laporan' ),	
	    'new_item' => __( 'Laporan Baru' ),	
	    'view' => __( 'Lihat Laporan' ),	
	    'view_item' => __( 'Lihat Laporan' ),	
	    'search_items' => __( 'Cari Laporan' ),	
	    'not_found' => __( 'Tidak ada Laporan ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Laporan di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title'),        			            
		'exclude_from_search' => false, 	 
		 )	
    );	
	
	add_action('admin_init', 'keuangan_meta_boxes', 1);
	function keuangan_meta_boxes() {
    	add_meta_box( 'keuangan-fields', 'Detail Laporan Keuangan Bulanan', 'hhs_keuangan_meta_box_display', 'laporan', 'normal', 'default');
    }

	function hhs_keuangan_meta_box_display() {
    	global $post;
    	$keuangan_fields = get_post_meta($post->ID, 'keuangan_fields', true);
    	wp_nonce_field( 'hhs_keuangan_meta_box_nonce', 'hhs_keuangan_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
     	jQuery(document).ready(function( $ ){
    		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#keuangan-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    	});
    	</script>
		
		
  
    	<table id="keuangan-fieldset-one">
		    <tr>
					<td colspan="7">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <strong style="color: #f33;">KETERANGAN</strong> : Pada bagian judul (lihat di atas) ketikkan nama bulan dilanjutkan dengan tahun. Misalkan : <em>November 2017</em><br/>
									Tambahkan detail laporan perbaris dengan mengisikan nama laporan, tanggal (format <em>01-01-2017</em>) dan jumlah dana yang digunakan, misal : <em>1.000.000</em><br/><br/>
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
			    	                KEGUNAAN
								</div>
							</div>
						</div>
					</td>
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
			    	                JUMLAH (RP)
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
			
         	<?php if ( $keuangan_fields ) :
			foreach ( $keuangan_fields as $field ) { ?>
             	<tr>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <input type="text" placeholder="Untuk..." class="widefat" name="kegunaan[]" value="<?php if($field['kegunaan'] != '') echo esc_attr( $field['kegunaan'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Tanggal" class="widefat" name="tanglapo[]" value="<?php if($field['tanglapo'] != '') echo esc_attr( $field['tanglapo'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jumlah" class="widefat" name="jumlah[]" value="<?php if($field['jumlah'] != '') echo esc_attr( $field['jumlah'] ); ?>" />
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
			    	                <input type="text" placeholder="Untuk.." class="widefat" name="kegunaan[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Tanggal" class="widefat" name="tanglapo[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jumlah" class="widefat" name="jumlah[]" />
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
			    	                <input type="text" placeholder="Untuk.." class="widefat" name="kegunaan[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Tanggal" class="widefat" name="tanglapo[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jumlah" class="widefat" name="jumlah[]" />
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
							    <div class="halfin"><br/><a id="add-row" class="button button-primary button-large" href="#">+ Tambah Baru</a></div> 
							</div>
						</div>
					</td>
				</tr>
		</table>
	
    	<?php
    }

	add_action('save_post', 'hhs_keuangan_meta_box_save');

	function hhs_keuangan_meta_box_save($post_id) {
    	if ( ! isset( $_POST['hhs_keuangan_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['hhs_keuangan_meta_box_nonce'], 'hhs_keuangan_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'keuangan_fields', true);
    	$new = array();
	
    	$kegunaans = $_POST['kegunaan'];
    	$tanglapos = $_POST['tanglapo'];
		$jumlahs = $_POST['jumlah'];
	
    	$count = count( $tanglapos );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $kegunaans[$i] != '' ) {
	    		$new[$i]['kegunaan'] = stripslashes( $kegunaans[$i] );
		        $new[$i]['tanglapo'] = stripslashes( $tanglapos[$i] ); 
				$new[$i]['jumlah'] = stripslashes( $jumlahs[$i] ); 
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'keuangan_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'keuangan_fields', $old );
	}
	
?>
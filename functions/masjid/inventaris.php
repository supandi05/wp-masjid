<?php 

/*** POST TYPE inv ***/
	
	register_post_type( 'inventaris',		
	array(			
	    'menu_icon' => 'dashicons-format-aside',
	    'labels' => array(				
	    'name' => __( 'Inventaris' ),				
	    'singular_name' => __( 'Inventaris' ),        
	    'add_new' => __( 'Tambah Inventaris?' ),	
	    'add_new_item' => __( 'Tambah Inventaris' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Inventaris' ),	
	    'new_item' => __( 'Inventaris Baru' ),	
	    'view' => __( 'Lihat Inventaris' ),	
	    'view_item' => __( 'Lihat Inventaris' ),	
	    'search_items' => __( 'Cari Inventaris' ),	
	    'not_found' => __( 'Tidak ada Inventaris ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Inventaris di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		 )	
    );

	add_action('admin_init', 'inv_meta_boxes', 2);
	function inv_meta_boxes() {
    	add_meta_box( 'inv-fields', 'Daftar Inventaris / Fasilitas / Sarana', 'inv_meta_box_display', 'inventaris', 'normal', 'default');
    }

	function inv_meta_box_display() {
    	global $post;
    	$inv_fields = get_post_meta($post->ID, 'inv_fields', true);
    	wp_nonce_field( 'inv_meta_box_nonce', 'inv_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
     	jQuery(document).ready(function( $ ){
    		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#inv-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    	});
    	</script>
		
		
  
    	<table width="100%" id="inv-fieldset-one">
		    <tr>
					<td colspan="3">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <strong style="color: #f33;">KETERANGAN</strong> : Pada bagian judul diatas masukan nama grup inventaris misalnya Peralatan Dapur, lalu di kolom dibawah ini masukkan jenis-jenis peralatan dapur beserja jumlah dan juga kondisi umumnya<br/><br/>
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
			    	                NAMA
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                JUMLAH
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                KONDISI
								</div>
							</div>
						</div>
					</td>
					<td width="30">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin" style="text-align: center;">
			    	                x
								</div>
							</div>
						</div>
					</td>
			</tr>
			
         	<?php if ( $inv_fields ) :
			foreach ( $inv_fields as $field ) { ?>
             	<tr>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <input type="text" placeholder="Nama..." class="tanggal widefat" name="namainv[]" value="<?php if($field['namainv'] != '') echo esc_attr( $field['namainv'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jumlah" class="widefat" name="jumlahinv[]" value="<?php if($field['jumlahinv'] != '') echo esc_attr( $field['jumlahinv'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Kondisi" class="widefat" name="kondisiinv[]" value="<?php if($field['kondisiinv'] != '') echo esc_attr( $field['kondisiinv'] ); ?>" />
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
			    	                <input type="text" placeholder="Nama..." class="widefat" name="namainv[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jumlah" class="widefat" name="jumlahinv[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Kondisi" class="widefat" name="kondisiinv[]" />
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
			    	                <input type="text" placeholder="Nama..." class="widefat" name="namainv[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jumlah" class="widefat" name="jumlahinv[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Kondisi" class="widefat" name="kondisiinv[]" />
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
							    <div class="halfin"><br/><a id="add-row" class="button button-primary button-large" href="#">+ Tambah Inventaris</a></div> 
							</div>
						</div>
					</td>
				</tr>
		</table>
	
    	<?php
    }

	add_action('save_post', 'inv_meta_box_save');

	function inv_meta_box_save($post_id) {
    	if ( ! isset( $_POST['inv_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['inv_meta_box_nonce'], 'inv_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'inv_fields', true);
    	$new = array();
	
    	$pnamainv = $_POST['namainv'];
    	$pjumlahinv = $_POST['jumlahinv'];
		$pkondisiinv = $_POST['kondisiinv'];
	
    	$count = count( $pnamainv );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $pnamainv[$i] != '' ) {
	    		$new[$i]['namainv'] = stripslashes( $pnamainv[$i] );
		        $new[$i]['jumlahinv'] = stripslashes( $pjumlahinv[$i] ); 
				$new[$i]['kondisiinv'] = stripslashes( $pkondisiinv[$i] ); 
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'inv_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'inv_fields', $old );
	}
	
?>
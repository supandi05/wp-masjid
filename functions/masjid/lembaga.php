<?php 

/*** POST TYPE inv ***/
	
	register_post_type( 'lembaga',		
	array(			
	    'menu_icon' => 'dashicons-feedback',
	    'labels' => array(				
	    'name' => __( 'Lembaga' ),				
	    'singular_name' => __( 'Lembaga' ),        
	    'add_new' => __( 'Tambah Lembaga?' ),	
	    'add_new_item' => __( 'Tambah Lembaga' ),	
	    'edit' => __( 'Edit' ),	 
	    'edit_item' => __( 'Edit Lembaga' ),	
	    'new_item' => __( 'Lembaga Baru' ),	
	    'view' => __( 'Lihat Lembaga' ),	
	    'view_item' => __( 'Lihat Lembaga' ),	
	    'search_items' => __( 'Cari Lembaga' ),	
	    'not_found' => __( 'Tidak ada Lembaga ditemukan' ),	
	    'not_found_in_trash' => __( 'Tidak ada Lembaga di folder Trash' ),	
	    'parent' => __( 'Parent Super Duper' ),			
	    ),		                	
		'public' => true,           					            
		'has_archive' => true,        			            
		'supports' => array( 'title', 'editor', 'thumbnail'),        			            
		'exclude_from_search' => false, 	 
		 )	
    );

	add_action('admin_init', 'pengurus_meta_boxes', 2);
	function pengurus_meta_boxes() {
    	add_meta_box( 'pengurus-fields', 'Daftar Pengurus', 'hhs_pengurus_meta_box_display', 'lembaga', 'normal', 'default');
    }

	function hhs_pengurus_meta_box_display() {
    	global $post;
    	$pengurus_fields = get_post_meta($post->ID, 'pengurus_fields', true);
    	wp_nonce_field( 'hhs_pengurus_meta_box_nonce', 'hhs_pengurus_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
     	jQuery(document).ready(function( $ ){
    		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#pengurus-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    	});
    	</script>
		
		
  
    	<table width="100%" id="pengurus-fieldset-one">
		    <tr>
					<td colspan="3">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <strong style="color: #f33;">KETERANGAN</strong> : Tambahkan daftar pengurus beserta dengan jabatan atau tugasnya<br/><br/>
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
			    	                JABATAN
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
			
         	<?php if ( $pengurus_fields ) :
			foreach ( $pengurus_fields as $field ) { ?>
             	<tr>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <input type="text" placeholder="Nama..." class="tanggal widefat" name="namape[]" value="<?php if($field['namape'] != '') echo esc_attr( $field['namape'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Jabatan" class="widefat" name="tugas[]" value="<?php if($field['tugas'] != '') echo esc_attr( $field['tugas'] ); ?>" />
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
			    	                <input type="text" placeholder="Nama..." class="namape widefat" name="namape[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Tugas" class="widefat" name="tugas[]" />
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
			    	                <input type="text" placeholder="Nama..." class="widefat" name="namape[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Tugas" class="widefat" name="tugas[]" />
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

	add_action('save_post', 'hhs_pengurus_meta_box_save');

	function hhs_pengurus_meta_box_save($post_id) {
    	if ( ! isset( $_POST['hhs_pengurus_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['hhs_pengurus_meta_box_nonce'], 'hhs_pengurus_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'pengurus_fields', true);
    	$new = array();
	
    	$pnamape = $_POST['namape'];
    	$ptugas = $_POST['tugas'];
	
    	$count = count( $pnamape );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $pnamape[$i] != '' ) {
	    		$new[$i]['namape'] = stripslashes( $pnamape[$i] );
		        $new[$i]['tugas'] = stripslashes( $ptugas[$i] ); 
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'pengurus_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'pengurus_fields', $old );
	}
	
?>
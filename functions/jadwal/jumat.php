<?php 
	
/*** POST TYPE JADWAL SHALAT ***/		

	register_post_type( 'jadwal-jumat',		
	array(			
	    'menu_icon' => 'dashicons-calendar-alt',
		'labels' => array(				
	    'name' => __( 'Jadwal Jumat' ),				
	    'singular_name' => __( 'Jadwal Jumat' ),        
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
	
	add_action('admin_init', 'jumat_meta_boxes', 1);
	function jumat_meta_boxes() {
    	add_meta_box( 'jumat-fields', 'Jadwal Petugas Jumat', 'hhs_jumat_meta_box_display', 'jadwal-jumat', 'normal', 'default');
    }

	function hhs_jumat_meta_box_display() {
    	global $post;
    	$jumat_fields = get_post_meta($post->ID, 'jumat_fields', true);
    	wp_nonce_field( 'hhs_jumat_meta_box_nonce', 'hhs_jumat_meta_box_nonce' );
    	?>
    
    	<script type="text/javascript">
     	jQuery(document).ready(function( $ ){
    		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#jumat-fieldset-one tbody>tr:last' );
			return false;
		});
  	
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
    	});
    	</script>
		
		
  
    	<table id="jumat-fieldset-one" width="100%">
		    <tr>
					<td colspan="7">
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <strong style="color: #f33;">KETERANGAN</strong> : Pada bagian judul (lihat di atas) ketikkan nama bulan dilanjutkan dengan tahun. Misalkan : <em>Oktober 2017</em><br/>
									Untuk detail jadwal silahkan diisi melalui form dibawah ini dengan pengisian waktu gunakan format <em>01-01-2017</em> untuk tanggal<br/><br/>
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
			    	                IMAM
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                KHATIB
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                MUADZIN
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
			
         	<?php if ( $jumat_fields ) :
			foreach ( $jumat_fields as $field ) { ?>
             	<tr>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			    	                <input type="text" placeholder="01-01-2017" class="tanggal widefat" name="tanggalj[]" value="<?php if($field['tanggalj'] != '') echo esc_attr( $field['tanggalj'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Imam" class="widefat" name="imam[]" value="<?php if($field['imam'] != '') echo esc_attr( $field['imam'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Khatib" class="widefat" name="khatib[]" value="<?php if($field['khatib'] != '') echo esc_attr( $field['khatib'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Muadzin" class="widefat" name="muadzin[]" value="<?php if($field['muadzin'] != '') echo esc_attr( $field['muadzin'] ); ?>" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
				                	<a class="button button-primary remove-row" href="#">x</a>
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
			    	                <input type="text" placeholder="Tanggal" class="tanggal widefat" name="tanggalj[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Imam" class="widefat" name="imam[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Khatib" class="widefat" name="khatib[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Muadzin" class="widefat" name="muadzin[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
				                	<a class="button button-primary  remove-row" href="#">x</a>
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
			    	                <input type="text" placeholder="Tanggal" class="tanggal widefat" name="tanggalj[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Imam" class="widefat" name="imam[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Khatib" class="widefat" name="khatib[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
			                	    <input type="text" placeholder="Muadzin" class="widefat" name="muadzin[]" />
								</div>
							</div>
						</div>
					</td>
					<td>
					    <div class="clear">
						    <div class="half">
							    <div class="halfin">
				                	<a class="button button-primary remove-row" href="#">x</a>
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

	add_action('save_post', 'hhs_jumat_meta_box_save');

	function hhs_jumat_meta_box_save($post_id) {
    	if ( ! isset( $_POST['hhs_jumat_meta_box_nonce'] ) ||
        	! wp_verify_nonce( $_POST['hhs_jumat_meta_box_nonce'], 'hhs_jumat_meta_box_nonce' ) )
	    	return;
	
    	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	    	return;
	
    	if (!current_user_can('edit_post', $post_id))
	    	return;
	
    	$old = get_post_meta($post_id, 'jumat_fields', true);
    	$new = array();
	
    	$jtanggalj = $_POST['tanggalj'];
    	$jimam = $_POST['imam'];
		$jkhatib = $_POST['khatib'];
		$jmuadzin = $_POST['muadzin'];
	
    	$count = count( $jtanggalj );
	
    	for ( $i = 0; $i < $count; $i++ ) {
	    	if ( $jtanggalj[$i] != '' ) {
	    		$new[$i]['tanggalj'] = stripslashes( $jtanggalj[$i] );
		        $new[$i]['imam'] = stripslashes( $jimam[$i] ); 
				$new[$i]['khatib'] = stripslashes( $jkhatib[$i] ); 
				$new[$i]['muadzin'] = stripslashes( $jmuadzin[$i] );
	    	}
    	}
		
    	if ( !empty( $new ) && $new != $old )
    		update_post_meta( $post_id, 'jumat_fields', $new );
    	elseif ( empty($new) && $old )
    		delete_post_meta( $post_id, 'jumat_fields', $old );
	}

?>
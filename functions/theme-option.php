<?php

/**
 * Pengaturan tema WP Masjid
 * Author : yayun
 * Facebook : http://facebook.com/ciussgw
 * Whatsapp : 0838-1525-1385
 */
 
add_action( 'admin_menu', 'masjid_add_page' );
function masjid_add_page() {
    $masjid_options_page = add_menu_page( 'Pengaturan Tema', '<strong>SETTING v1.0.5</strong>', 'manage_options', 'wp-masjid', 'options_page', 'dashicons-list-view', 2 );
} 

function options_page() {
	// Cek update input pengaturan
	if ($_POST['update_options'] == 'true') {
	    
		update_option('nama', $_POST['nama']);
		update_option('luastanah', $_POST['luastanah']);
		update_option('luasbang', $_POST['luasbang']);
		update_option('status', $_POST['status']);
		update_option('tahun', $_POST['tahun']);
		update_option('alamat', $_POST['alamat']);
		update_option('maps', $_POST['maps']);
		update_option('apikey', $_POST['apikey']);
		update_option('kelurahan', $_POST['kelurahan']);
		update_option('kecamatan', $_POST['kecamatan']);
		update_option('kabupaten', $_POST['kabupaten']);
		update_option('provinsi', $_POST['provinsi']);
		update_option('kodepos', $_POST['kodepos']);
		update_option('telepon', $_POST['telepon']);
		update_option('fax', $_POST['fax']);
		update_option('email', $_POST['email']);
		
		update_option('facebook', $_POST['facebook']);
		update_option('twitter', $_POST['twitter']);
		update_option('google', $_POST['google']);
		update_option('youtube', $_POST['youtube']);
		
		update_option('naketua', $_POST['naketua']);
		update_option('pketua', $_POST['pketua']);
		update_option('nawakil', $_POST['nawakil']);
		update_option('pwakil', $_POST['pwakil']);
		update_option('naseke', $_POST['naseke']);
		update_option('pseke', $_POST['pseke']);
		update_option('nabenda', $_POST['nabenda']);
		update_option('pbenda', $_POST['pbenda']);
		
		update_option('imam-subuh', $_POST['imam-subuh']);
		update_option('muadzin-subuh', $_POST['muadzin-subuh']);
		update_option('imam-dzuhur', $_POST['imam-dzuhur']);
		update_option('muadzin-dzuhur', $_POST['muadzin-dzuhur']);
		update_option('imam-ashar', $_POST['imam-ashar']);
		update_option('muadzin-ashar', $_POST['muadzin-ashar']);
		update_option('imam-maghrib', $_POST['imam-maghrib']);
		update_option('muadzin-maghrib', $_POST['muadzin-maghrib']);
		update_option('imam-isya', $_POST['imam-isya']);
		update_option('muadzin-isya', $_POST['muadzin-isya']);
		
        update_option('sekilas', $_POST['sekilas']);
		update_option('waktu', $_POST['waktu']);
		update_option('dkm', $_POST['dkm']);
		update_option('pusat', $_POST['pusat']);
		update_option('agenda', $_POST['agenda']);
		update_option('umum', $_POST['umum']);
		update_option('lapin', $_POST['lapin']);
		update_option('meleng', $_POST['meleng']);
		update_option('berita', $_POST['berita']);
		update_option('tausiyah', $_POST['tausiyah']);
		update_option('layanan', $_POST['layanan']);
		update_option('galeri', $_POST['galeri']);
		update_option('video', $_POST['video']);
		update_option('invent', $_POST['invent']);
		update_option('perpus', $_POST['perpus']);
		update_option('jumat', $_POST['jumat']);
		update_option('shalat', $_POST['shalat']);
		update_option('laporan', $_POST['laporan']);
		update_option('layanan', $_POST['layanan']);
		update_option('ramadhan', $_POST['ramadhan']);
		
		update_option('logos', $_POST['logos']);
		update_option('favicon', $_POST['favicon']);
		
		update_option('mwarna', $_POST['mwarna']);
		update_option('fixed', $_POST['fixed']);
	}
	?>
	
	<div class="seet">
	    <div class="severlay"></div>
	    <div class="outer">
	    	<?php wp_enqueue_style('awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css'); ?>
			<?php wp_enqueue_style('admin-css', get_template_directory_uri() . '/css/admin-css.css'); ?>
            <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
            <script type="text/javascript">
		    	$("document").ready(function($){
			    	$("#change, #layout, #setting, #styles, #external").slideUp();
					$(".welcome").click(function(){
				    	$(".welcome").css("background","#89cc97");
						$("#welcome").slideDown();
						$("#change, #layout, #setting, #styles, #external").slideUp();
						$(".change, .layout, .setting, .styles, .external").css("background","none");
					});
					$(".setting").click(function(){
			    		$(".setting").css("background","#89cc97");
						$("#setting").slideDown();
						$("#change, #layout, #welcome, #styles, #external").slideUp();
						$(".change, .layout, .welcome, .styles, .external").css("background","none");
					});
					$(".change").click(function(){
		    			$(".change").css("background","#89cc97");
						$("#change").slideDown();
						$("#setting, #layout, #welcome, #styles, #external").slideUp();
						$(".setting, .layout, .welcome, .styles, .external").css("background","none");
					});
					$(".layout").click(function(){
				    	$(".layout").css("background","#89cc97");
						$("#layout").slideDown();
						$("#change, #setting, #welcome, #styles, #external").slideUp();
						$(".change, .setting, .welcome, .styles, .external").css("background","none");
					});
					$(".styles").click(function(){
				    	$(".styles").css("background","#89cc97");
						$("#styles").slideDown();
						$("#change, #setting, #welcome, #layout, #external").slideUp();
						$(".change, .setting, .welcome, .layout, .external").css("background","none");
					});
					$(".external").click(function(){
				    	$(".external").css("background","#89cc97");
						$("#external").slideDown();
						$("#change, #setting, #welcome, #styles, #layout").slideUp();
						$(".change, .setting, .welcome, .styles, .layout").css("background","none");
					});
					$(".submit").click(function(){
				    	$(".severlay").css("z-index","300");
					});
				});
			</script>

	    	<script>
		    	$(window).scroll(function() {
			    	if ($(this).scrollTop() >= 150) {
			    		$('#msub').fadeIn(200);
			     	} else {
			    		$('#msub').fadeOut(200);
			    	}
		    	});
	    	</script>
			
			<?php if(function_exists( 'wp_enqueue_media' )){
		    	wp_enqueue_media();
			} else {
		    	wp_enqueue_style('thickbox');
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
			}
			?>
			

			
			<form method="post" action="">
		    	<input class="submit" type="submit" id="msub" value="SIMPAN" />
		    	<input type="hidden" name="update_options" value="true" />
				<div class="tab_block">
			    	<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="mlogo" />
	             	<input id="save" class="submit" type="submit" value="SIMPAN" />
				</div>

				<div class="set_block">
			    	<div class="inn">
				    	<?php get_template_part('admin/admin-menu'); ?>

						<div class="rmenu">
					    	<div id="welcome">
						    	<div class="wel">
							    	<h3>
							    		Selamat datang <?php $user = wp_get_current_user(); printf( __( ', <em>%s</em> di Dasbor WP Masjid', 'wp-masjid' ), esc_html( $user->user_login ) ) . ''; ?>
							    	</h3>
									
									<?php if ( $user ) : ?>
									    <br/><img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" /><br/><br/><br/>
										<?php endif; ?><div class="content">
										Ini adalah panel pengaturan untuk tema WP Masjid, administrator website dapat melengkapi atau merubah data sesuai dengan keperluan. Jika ada kendala seputar tema silahkan kunjungi group facebook tema <a href="https://facebook.com/groups/wp.masjid" target="_blank">Diskusi WP Masjid</a> untuk menemukan solusi, jika masih tetap belum menemukan solusi silahkan hubungi developer tema.<br/><br/>
										
										facebook : <a href="http://facebook.com/ciussgw">yayun</a> | <i class="fa fa-whatsapp"></i> 0838-1525-1385 | <i class="fa fa-envelope"></i> yayun@ciuss.com<br/>
									</div>
								</div>
							</div>

							<div id="setting">
						    	<div class="btable">
							    	<table width="100%">
								    	
										<?php get_template_part('admin/data-masjid'); ?>
										
									</table>
								</div>
		                	</div>
							
							<div id="styles">
					    		<div class="btable">
								    <table width="100%">
									
									    <?php get_template_part('admin/pengurus'); ?>
										<?php get_template_part('admin/petugas'); ?>
										
									</table>
						    	</div>
					    	</div>
				
							<div id="change">
						    	<div class="btable">
							    	<table width="100%">
									    
										<?php get_template_part('admin/replace'); ?>
										
				    		    	</table>
				    	    	</div>
				            </div>
				
							<div id="layout">
					    		<div class="btable">
	    			    			<table width="100%">
									
									    <?php get_template_part('admin/styling'); ?>
									
						        	</table>
					    		</div>
					    	</div>
							
							<div id="external">
					    		<div class="btable">
	    			    			<table width="100%">
									
									    <?php get_template_part('admin/developer'); ?>
									
						        	</table>
					    		</div>
					    	</div>
							
		            	</div>
	            	</div>
            	</div>
		    </form>
		</div>
	</div>
	<?php } ?>

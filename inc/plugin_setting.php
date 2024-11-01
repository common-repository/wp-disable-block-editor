<?php if (!defined('ABSPATH')) die(); 

	function WP_Disable_Gutenberg_register_settings() { 
	   add_option( 'WP_Disable_Gutenberg', 'Deactivate Gutenberg');
	   register_setting( 'myplugin_options_group', 'WP_Disable_Gutenberg', 'myplugin_callback' );
	}
	add_action( 'admin_init', 'WP_Disable_Gutenberg_register_settings' );

	function WP_Disable_Gutenberg_register_options_page() {
	  add_options_page('WP Disable Gutenberg', 'WP Disable Gutenberg', 'manage_options', 'WP_Disable_Gutenberg', 'WP_Disable_Gutenberg_options_page');
	}
	add_action('admin_menu', 'WP_Disable_Gutenberg_register_options_page');

	function WP_Disable_Gutenberg_action_links( $links ) {
	   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=WP_Disable_Gutenberg') ) .'">Settings</a>';
	   return $links;
	}

	$WP_Disable_Gutenberg =  get_option('WP_Disable_Gutenberg');
	if($WP_Disable_Gutenberg == 'on'){ 
		// disable for posts
		add_filter('gutenberg_can_edit_post', '__return_false', 10);

		// disable for post types
		add_filter('gutenberg_can_edit_post_type', '__return_false', 10);

		// disable for posts
		add_filter('use_block_editor_for_post', '__return_false', 10);

		// disable for post types
		add_filter('use_block_editor_for_post_type', '__return_false', 10);
	}
function WP_Disable_Gutenberg_options_page()
{
	$WP_Disable_Gutenberg =  get_option('WP_Disable_Gutenberg');
	if($WP_Disable_Gutenberg){
		$WP_Disable_Gutenberg_select = 'checked';
	}else{
		$WP_Disable_Gutenberg_select = '';
	}
?>
<style type="text/css">
.settings_page_WP_Disable_Gutenberg table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.settings_page_WP_Disable_Gutenberg td,.settings_page_WP_Disable_Gutenberg th {
  text-align: left;
  padding: 18px;
}
.settings_page_WP_Disable_Gutenberg tr {
 	border: 1px solid #dddddd;
}

.settings_page_WP_Disable_Gutenberg tr:nth-child(even) {
  background-color: #dddddd;
}

.settings_page_WP_Disable_Gutenberg .form-table {
    border-collapse: collapse;
    margin-top: 0em;
    width: 100%;
    clear: both;
}

.settings_page_WP_Disable_Gutenberg th {
    vertical-align: top;
    text-align: left;
    padding: 20px 10px 20px 10px;
    width: 225px;
    line-height: 1.3;
    font-weight: 600;
}
.settings_page_WP_Disable_Gutenberg form h3{
    font-size: 16px;
    background: #a95724;
    color: #ffffff;
    padding: 5px 25px;
    margin-bottom: 0px;
    display: inline-block;
    margin-top: 0px;
}
.settings_page_WP_Disable_Gutenberg .top_label{
    font-size: 16px;
    background: #a95724;
    color: #ffffff;
    padding: 10px !important;
    font-weight: bold;
	margin-bottom: 0px;
}
.settings_page_WP_Disable_Gutenberg form {
    border: 5px solid #a95724;
    margin-top: 2px;
}
.settings_page_WP_Disable_Gutenberg form p.submit {
    text-align: right;
    margin-right: 50px;
}
.settings_page_WP_Disable_Gutenberg input.button-primary {
    color: #fff;
    background-color: #a95724;
    border-radius: 0.25em;
    font-size: 16px;
    font-family: 'Exo', sans-serif;
    font-weight: 700;
    cursor: pointer;
    -webkit-transition: all 0.2s ease-in;
    -moz-transition: all 0.2s ease-in;
    -ms-transition: all 0.2s ease-in;
    -o-transition: all 0.2s ease-in;
    transition: all 0.2s ease-in;
    box-shadow: none;
    text-shadow: none;
    border: none;
    padding: 6px 12px;
    height: auto;
}
.settings_page_WP_Disable_Gutenberg input.button-primary:hover{
	opacity: 0.8;
    color: #fff;
    background-color: #a95724;
}
.top_label em {
    font-size: 15px;
    float: right;
    padding: 5px;
}

.settings_page_WP_Disable_Gutenberg p {
    vertical-align: top;
    text-align: left;
    padding: 4px 3px;
    line-height: 1.3;
    font-weight: 600;
}
.settings_page_WP_Disable_Gutenberg .wdg_top_label {
    font-size: 16px;
    background: #a95724;
    color: #ffffff;
    padding: 10px !important;
    font-weight: bold;
    margin-bottom: 0px;
}
.settings_page_WP_Disable_Gutenberg .wdg_top_label em{
    font-size: 15px;
    float: right;
    padding: 0px;
}
</style>
  <div>
	  <h2 class="wdg_top_label">WP Disable Gutenberg Setting<em>Created By - IIH Global</em></h2>
	  <form method="post" name="WP_Disable_Gutenberg_form" action="options.php">
	  	<?php //wp_nonce_field( 'WP_Disable_Gutenberg_form_submit', 'WP_Disable_Gutenberg_form_nonce' ); ?>
	  	  <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('WP_Disable_Gutenberg')?>">
		  <?php settings_fields( 'myplugin_options_group' ); ?>
		  <h3>You can Disable/enable setting</h3>
		 <!--  <p>You can Disable/enable setting</p> -->
		  <table>
			  <tr valign="top">
			  	<th scope="row"><label for="WP_Disable_Gutenberg">Disable/Enable Gutenberg Editor</label></th>
			  	<td><input type="checkbox" id="WP_Disable_Gutenberg" name="WP_Disable_Gutenberg"  <?php echo $WP_Disable_Gutenberg_select;  ?> /></td>
			  </tr>
		  </table>
		  <?php  submit_button(); ?>
	  </form>
  </div>
<?php
	//if(check_admin_referer( 'WP_Disable_Gutenberg_form_submit', 'WP_Disable_Gutenberg_form_nonce' )){
		if(isset($_POST['WP_Disable_Gutenberg_form']) && isset($_POST['nonce']) &&wp_verify_nonce($_POST['nonce'])){
			if(isset($_POST['WP_Disable_Gutenberg']) && !empty($_POST['WP_Disable_Gutenberg'])){
				$_POST['WP_Disable_Gutenberg'] = filter_var($_POST['WP_Disable_Gutenberg'], FILTER_SANITIZE_STRING);
				update_option( 'WP_Disable_Gutenberg', sanitize_text_field($_POST['WP_Disable_Gutenberg']));
			}
		}
	//}
} 
?>
<?php 
/**
 * Plugin Name: My Plugin
 * Plugin URI: https://dawpguys.com
 * Description: This is just a demo plugin.
 * Author: Sujit
 * Author URI: https://dawpguys.com
 * Lisence: gplv2
 * Version: 1.1
 */

/**
* Main Class
*/
include ('custom-post.php');
class My_Plugin
{
	/*
	Intialize all actions
	 */
	function __construct()
	{
		add_action('admin_menu', array(&$this, 'wpdev_register_admin_menu'));
	}

	function wpdev_register_admin_menu(){
		add_menu_page( 'My Plugin Page', 'My Plugin', 'manage_options', 'my_plugin', array(&$this,'wpdev_setup_page'), 'dashicons-store' );
	}

	function wpdev_setup_page(){
		?>
		<div class="wrap">
		<h1>Custom Post Setup</h1>
		<form method="post" action="option.php">
		<?php settings_fields( $option_group ); ?>
			<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="singular_name"><?php _e( 'Singular Name' ) ?></label></th>
					<td><input type="text" class="regular-text" name="cp_singular" value="<?php $cp_singular ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label for="plural_name"><?php _e( 'Plural Name' ) ?></label></th>
					<td><input type="text" class="regular-text" name="cp_plural" value="<?php $cp_plural ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label for="cp_slug_name"><?php _e( 'CP Slug Name' ) ?></label></th>
					<td><input type="text" class="regular-text" name="cp_slug_name" value="<?php $cp_slug_name ?>"></td>
				</tr>

			</tbody>
			</table>
		</form>
		</div>

	<?php
	}
}

$my_obj = new My_Plugin();
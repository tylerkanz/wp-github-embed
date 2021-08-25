<?php

/**
 * Fired during plugin activation
 *
 * @link       https://tylerkanz.com
 * @since      1.0.0
 *
 * @package    Wp_Github_Embed
 * @subpackage Wp_Github_Embed/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Github_Embed
 * @subpackage Wp_Github_Embed/includes
 * @author     Tyler Kanz <tylerkanz@gmail.com>
 */
class Wp_Github_Embed_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); 
		global $wpdb;
		$sql = "CREATE TABLE  ". $wpdb->prefix . "git_embed_meta (
			meta_id bigint(20) NOT NULL auto_increment,
			meta_key varchar(255) default NULL,
			user varchar(255) default NULL,
			repo varchar(255) default NULL,
			meta_value longtext,
			PRIMARY KEY  (`meta_id`)
		  )";

		maybe_create_table( $wpdb->prefix . 'git_embed_meta', $sql );

	}

}

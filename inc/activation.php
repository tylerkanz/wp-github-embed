<?php

register_activation_hook(__FILE__, 'create_maybe');

class Wp_Github_Embed_Activator {

	public static function activate() {

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); 
		global $wpdb;
		$sql = "CREATE TABLE  ". $wpdb->prefix . "git_embed_meta (
			meta_id bigint(20) NOT NULL auto_increment,
			meta_key varchar(255) default NULL,
			meta_value longtext,
			PRIMARY KEY  (`meta_id`)
		  )";

		maybe_create_table( $wpdb->prefix . 'git_embed_meta', $sql );

	}

}

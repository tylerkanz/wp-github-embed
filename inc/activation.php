<?php
global $wpdb;
$table_name = $wpdb->prefix . 'dbdelta_test_001';
$wpdb_collate = $wpdb->collate;
$sql =
"CREATE TABLE {$table_name} (
    id mediumint(8) unsigned NOT NULL auto_increment ,
    first varchar(255) NULL,
    PRIMARY KEY  (id),
    KEY first (first)
    )
    COLLATE {$wpdb_collate}";
 
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta( $sql );
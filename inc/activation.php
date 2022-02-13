<?php

class Activation
{
    public $aMemberVar = 'aMemberVar Member Variable';
    public $aFuncName = 'aMemberFunc';
    public $sql = "CREATE TABLE {$this->public} (\n\t\t\tid int(11) NOT NULL auto_increment,\n\t\t\temail varchar(64) NOT NULL default '',\n\t\t\tactive tinyint(1) default 0,\n\t\t\tdate DATE default '{$date}' NOT NULL,\n\t\t\ttime TIME DEFAULT '00:00:00' NOT NULL,\n\t\t\tip char(64) NOT NULL default 'admin',\n\t\t\tconf_date DATE,\n\t\t\tconf_time TIME,\n\t\t\tconf_ip char(64),\n\t\t\tPRIMARY KEY (id) )";
    // create the table, as needed

    function __construct()
    {
        register_activation_hook( __FILE__, $this->maybe_create_table() );
    }

    function maybe_create_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . "ge_meta";
        $charset_collate = $wpdb->get_charset_collate();
        $sql =  "CREATE TABLE $table_name (
            meta_id int(10) unsigned NOT NULL AUTO_INCREMENT,
            meta_key varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            meta_value varchar(100) COLLATE utf8_unicode_ci NOT NULL,
            PRIMARY KEY  (meta_id)
            ) $charset_collate;";

        maybe_create_table($this->public, $sql);
    }
}

<?php

// Run this code when plugin is uninstalled

// Securitycheck
defined( 'ABSPATH' ) or die( 'Go away!' );
defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'For real... Leave!' );

// Plugin fields in wp_options table, that needs to be removed
$forDeletion = array(	
	"db-hide-dashboard"	
);

foreach($forDeletion as $delete) {
	// Gain database access thru wpdb class
	global $wpdb;
	// Delete the fields in the database, one by one
	$wpdb->query("DELETE FROM wp_options WHERE option_name = '{$delete}'");
}
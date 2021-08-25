<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://tylerkanz.com
 * @since             1.0.0
 * @package           Wp_Github_Embed
 *
 * @wordpress-plugin
 * Plugin Name:       WP GitHub Embed
 * Plugin URI:        https://tylerkanz.com
 * Description:       Embed Repos and Profile attributes from your GitHub profile.
 * Version:           0.1.05
 * Author:            Tyler Kanz
 * Author URI:        https://tylerkanz.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-github-embed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_GITHUB_EMBED_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-github-embed-activator.php
 */
function activate_wp_github_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-github-embed-activator.php';
	Wp_Github_Embed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-github-embed-deactivator.php
 */
function deactivate_wp_github_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-github-embed-deactivator.php';
	Wp_Github_Embed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_github_embed' );
register_deactivation_hook( __FILE__, 'deactivate_wp_github_embed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-github-embed.php';
require plugin_dir_path( __FILE__ ) . 'includes/wp-github-embed-functions.php';
require plugin_dir_path( __FILE__ ) . 'public/partials/wp-github-embed-repos.php';
require plugin_dir_path( __FILE__ ) . 'public/partials/wp-github-embed-profile.php';

//Check for Updates
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/tylerkanz/wp-github-embed/',
	__FILE__,
	'wp-github-embed'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_github_embed() {

	$plugin = new Wp_Github_Embed();
	$plugin->run();

}
run_wp_github_embed();

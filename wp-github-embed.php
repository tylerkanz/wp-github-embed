<?php
/**
 * Plugin Name:       Wp Github Embed
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Tyler Kanz
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-github-embed
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_wp_github_embed_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_wp_github_embed_block_init' );

function activate_wp_github_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/activation.php';
	Wp_Github_Embed_Activator::activate();
}

register_activation_hook( __FILE__, 'activate_wp_github_embed' );


//Endpoints
include('/endpoints/get-github-meta.php');



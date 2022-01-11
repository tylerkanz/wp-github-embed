<?php
/**
 * Plugin Name:       WP GitHub Embed
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           2.0.10
 * Author:            Tyler Kanz
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-github-embed
 *
 * @package           wp-github-embed
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/writing-your-first-block-type/
 */
function wp_github_embed_wp_github_embed_block_init() {
	register_block_type( __DIR__ );
}
add_action( 'init', 'wp_github_embed_wp_github_embed_block_init' );

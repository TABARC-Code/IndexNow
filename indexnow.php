<?php
/**
 * Plugin Name: IndexNow
 * Plugin URI: https://github.com/TABARC-Code/
 * Description: Hardened IndexNow submission plugin for WordPress. Conservative defaults. Minimal surface area.
 * Version: 1.0.0.3
 * Author: TABARC-Code
 * Text Domain: indexnow
 */

if (!defined('ABSPATH')) {
	exit;
}

define('INDEXNOW_VERSION', '1.0.0.3');
define('INDEXNOW_FILE', __FILE__);
define('INDEXNOW_DIR', plugin_dir_path(__FILE__));
define('INDEXNOW_URL', plugin_dir_url(__FILE__));

require_once INDEXNOW_DIR . 'includes/class-indexnow-plugin.php';

add_action('plugins_loaded', function () {
	IndexNow\Plugin::instance()->init();
}, 1);

register_activation_hook(__FILE__, function () {
	require_once INDEXNOW_DIR . 'includes/class-indexnow-upgrades.php';
	IndexNow\Upgrades::activate();
});

register_deactivation_hook(__FILE__, function () {
	require_once INDEXNOW_DIR . 'includes/class-indexnow-upgrades.php';
	IndexNow\Upgrades::deactivate();
});

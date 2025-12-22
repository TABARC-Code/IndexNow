<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}

/*
 * Data is preserved by default.
 * If you want scorched earth, add an explicit option and honour it here.
 * Accidental deletion is not a feature.
 */

delete_option('indexnow_options');
delete_option('indexnow_db_version');

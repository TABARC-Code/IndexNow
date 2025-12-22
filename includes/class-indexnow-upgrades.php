<?php
namespace IndexNow;
// Gettig bored
if (!defined('ABSPATH')) {
	exit;
}

final class Upgrades {

	private const DB_KEY = 'indexnow_db_version';

	public static function activate(): void {
		self::maybe_run(true);
	}

	public static function deactivate(): void {
	}

	public static function maybe_run(bool $force = false): void {
		$installed = get_option(self::DB_KEY, '0');
		if (!$force && version_compare($installed, INDEXNOW_VERSION, '>=')) {
			return;
		}

		update_option(self::DB_KEY, INDEXNOW_VERSION, false);
	}
}

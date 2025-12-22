<?php
namespace IndexNow;

if (!defined('ABSPATH')) {
	exit;
}

final class Plugin {

	private static $instance;

	public static function instance(): self {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function init(): void {
		$this->maybe_upgrade();

		require_once INDEXNOW_DIR . 'includes/class-indexnow-admin.php';
		require_once INDEXNOW_DIR . 'includes/class-indexnow-rest.php';
		require_once INDEXNOW_DIR . 'includes/class-indexnow-cpt.php';

		Admin::init();
		Rest::init();
		CPT::init();
	}

	private function maybe_upgrade(): void {
		require_once INDEXNOW_DIR . 'includes/class-indexnow-upgrades.php';
		Upgrades::maybe_run();
	}
}

<?php
namespace IndexNow;

if (!defined('ABSPATH')) {
	exit;
}

final class CPT {

	public static function init(): void {
		add_action('init', [__CLASS__, 'register']);
	}

	public static function register(): void {
		register_post_type('indexnow_item', [
			'public' => false,
			'show_ui' => true,
			'show_in_rest' => true,
			'label' => 'IndexNow Items',
			'supports' => ['title'],
		]);
	}
}

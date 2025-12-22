<?php
namespace IndexNow;

use WP_REST_Response;
// Gods its late I need bloody sleep
if (!defined('ABSPATH')) {
	exit;
}

final class Rest {

	public static function init(): void {
		add_action('rest_api_init', [__CLASS__, 'routes']);
	}

	public static function routes(): void {
		register_rest_route('indexnow/v1', '/status', [
			'methods' => 'GET',
			'callback' => function () {
				return new WP_REST_Response([
					'plugin' => 'IndexNow',
					'version' => INDEXNOW_VERSION,
				], 200);
			},
			'permission_callback' => '__return_true',
		]);
	}
}

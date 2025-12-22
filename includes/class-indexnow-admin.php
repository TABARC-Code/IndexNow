<?php
namespace IndexNow;

if (!defined('ABSPATH')) {
	exit;
}

final class Admin {

	private const OPTION_KEY = 'indexnow_options';
	private const NONCE = 'indexnow_save';

	public static function init(): void {
		add_action('admin_menu', [__CLASS__, 'menu']);
		add_action('admin_init', [__CLASS__, 'handle_post']);
	}

	public static function menu(): void {
		add_options_page(
			'IndexNow',
			'IndexNow',
			'manage_options',
			'indexnow',
			[__CLASS__, 'render']
		);
	}

	public static function handle_post(): void {
		if (
			empty($_POST['indexnow_submit']) ||
			!current_user_can('manage_options')
		) {
			return;
		}

		check_admin_referer(self::NONCE);

		$options = [
			'key' => sanitize_text_field($_POST['key'] ?? ''),
		];

		update_option(self::OPTION_KEY, $options, false);
	}

	public static function render(): void {
		$options = get_option(self::OPTION_KEY, []);
		?>
		<div class="wrap">
			<h1>IndexNow</h1>
			<form method="post">
				<?php wp_nonce_field(self::NONCE); ?>
				<table class="form-table">
					<tr>
						<th>IndexNow Key</th>
						<td>
							<input type="text" name="key" value="<?php echo esc_attr($options['key'] ?? ''); ?>" class="regular-text">
						</td>
					</tr>
				</table>
				<p>
					<button class="button button-primary" name="indexnow_submit">Save</button>
				</p>
			</form>
		</div>
		<?php
	}
}

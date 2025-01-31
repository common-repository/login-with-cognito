<?php
/**
 * MINIORANGE OAuth client apps
 *
 * @package    Admin\Guides
 */

/**
 * Admin Guides
 */
class MoCognito_Admin_Admin_Guides {

	/**
	 * Instructions
	 *
	 * @param AppName $appname for application name.
	 */
	public static function instructions( $appname ) {
		self::instructions_page( $appname );
	}

	/**
	 * Instructions page
	 *
	 * @param AppName $appname for application name.
	 */
	public static function instructions_page( $appname ) {
		$app = mocognito_get_app( $appname );
		if ( ! $app ) {
			$appslist = get_option( 'mo_oauth_apps_list' );
			if ( count( $appslist ) > 0 ) {
				foreach ( $appslist as $key => $app ) {
					if ( $key === $appname ) {
						$currentapp = $app;
						break;
					}
				}
			}
			echo esc_attr( $currentapp['apptype'] );
			if ( 'oauth' === $currentapp['apptype'] ) {
				$app = mocognito_get_app( 'other' );
			} else {
				$app = mocognito_get_app( $currentapp['apptype'] );
			}
		}

		if ( strpos( $app->label, 'Custom' ) !== false ) {
			echo '<br><strong>Instructions to configure ' . esc_html( $app->label ) . ':</strong><ol>';
		} else {
			echo '<br><strong>Instructions to configure ' . esc_html( $app->label ) . ' as OAuth Server:</strong><ol>';
		}
		echo '<li>In front of <b>App Name</b> field, enter the name you would like to display on login button.</li>';
		if ( '' !== $app->guide ) {
			echo '<li>Please follow the instruction given in Step by Step guide to get your Client ID, Client Secret and other necessary information. <a href="' . esc_attr( $app->guide ) . '" target="_blank">Click here</a> to get the step by step guide to configure <i>' . esc_attr( explode( 'App', $app->label )[0] ) . '</i> as OAuth/OpenID Connect server.</li>';
		} else {
			echo '
			<li>Configure your application as a OAuth Provider.</li>
			<li>Provide <b>Configure OAuth->Redirect/Callback URI</b> for your OAuth server Redirect URI.<br/><b>Note : </b>Make sure, you have copied the exact callback url including http/https</li>
			<li>Choose the scopes as per your application/OAuth Server specification(if provided) and enter the same on the <a href="admin.php?page=mo_oauth_settings&appId=' . esc_attr( $app->app_id ) . '" target="_blank"><b>' . esc_attr( MO_OAUTH_ADMIN_MENU ) . ' -> Configure OAuth</b></a> page.</li>
			<li>Enter your <i>Client ID</i> and <i>Client Secret</i> provided by your OAuth Provider, on <a href="admin.php?page=mo_oauth_settings&appId=' . esc_attr( $app->app_id ) . '" target="_blank"><b>Configure OAuth</b></a> page.</li>';
		}
		echo '<li>Once done with configuration, click on <b>Save Settings</b>. Click on <b>Test Configuration</b> button.</li><li> On successful configuration, you will get a table with attributes names and values.<br>For example:<br><img src="' . esc_attr( plugins_url( './images/testconfig.png', __FILE__ ) ) . '" /></li><li>To proceed with SSO, you need to map attributes under Attribute Mapping section. Map attribute with the attribute name provided under Test Configuration table. <a href="https://faq.miniorange.com/knowledgebase/map-roles-usergroup/" target="_blank">Click here</a> to know more about how to configure attributes.</li><li>Go to <b>Appearance->Widgets</b>. Among the available widgets you will find <b>' . esc_attr( MO_OAUTH_ADMIN_MENU ) . '</b>, drag it to the widget area where you want it to appear.</li><li>To test the SSO, open the page where you have saved the widget in private window. On successful SSO, user will automatically get created in <a href="users.php" target="_blank">WordPress Users list</a>.</li></ol>';
	}
}



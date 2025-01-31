<?php
/**
 * MINIORANGE Admin Apps
 *
 * @package    Admin\Apps
 */

/**
 * Sign-in settings UI
 */
function mocognito_sign_in_settings_ui() {
	?>
	<div id="wid-shortcode" class="mo_table_layout">
		<div style="padding:15px 0px 5px;"><h2 style="display: inline;">Sign in options</h2><span style="float: right;">[ <a href="https://developers.miniorange.com/docs/oauth/wordpress/client/login-options" target="_blank">Click here</a> to know how this is useful. ]</span></div>
		<h4>Option 1: Use a Widget</h4>
		<ol>
			<li>Go to Appearances > Widgets.</li>
			<li>Select <b>"<?php echo esc_attr( MO_OAUTH_ADMIN_MENU ); ?>"</b>. Drag and drop to your favourite location and save.</li>
		</ol>

		<h4>Option 2: Use a Shortcode <small class=""><a href="admin.php?page=mo_oauth_settings&tab=licensing" target="_blank" rel="noopener noreferrer">[STANDARD]</a></small></h4>
		<ul>
			<li>Place shortcode <b>[mo_oauth_login]</b> in WordPress pages or posts.</li>
		</ul>
	</div>

	<!--div class="mo_oauth_premium_option_text"><span style="color:red;">*</span>This is a premium feature.
		<a href="admin.php?page=mo_oauth_settings&tab=licensing">Click Here</a> to see our full list of Premium Features.</div-->
	<div id="advanced_settings_sso" class="mo_table_layout ">
		<div style="padding:15px 0px 10px;"><h3 style="display: inline;">Advanced Settings </h3><span style="float: right;">[ <a href="https://developers.miniorange.com/docs/oauth/wordpress/client/forced-authentication" target="_blank">Click here</a> to know how this is useful. ]</span></div>
		<!--br><br-->
		<ul class="mo_premium_features_notice">
			<li>Custom redirect URL, Logging Out Confirmation, Allow Restricted Domains are available in <a href="admin.php?page=mo_oauth_settings&tab=licensing" target="_blank" rel="noopener noreferrer">Standard</a> version and above.</li>
			<li>Dynamic Callback URL, Single Login Flow and User Analytics are available in the <a href="admin.php?page=mo_oauth_settings&tab=licensing" target="_blank" rel="noopener noreferrer">Enterprise</a> version.</li>
			<li>Other features are available in the <a href="admin.php?page=mo_oauth_settings&tab=licensing" target="_blank" rel="noopener noreferrer">Premium</a> version and above.</li>
		</ul>
		<form id="role_mapping_form" name="f" method="post" action="">
		<?php wp_nonce_field( 'mo_oauth_role_mapping_form_nonce', 'mo_oauth_role_mapping_form_field' ); ?>
		<br>
		<input disabled="true" type="checkbox"><strong> Restrict site to logged in users</strong> ( Users will be auto redirected to OAuth login if not logged in )
		<p><input disabled="true" type="checkbox"><strong> Open login window in Popup</strong></p>

		<p><input checked disabled="true" type="checkbox"> <strong> Auto register Users </strong>(If unchecked, only existing users will be able to log-in)</p>
		<p><input disabled="true" type="checkbox"> <strong> Keep Existing Users </strong>If checked, existing users' attributes will <strong>NOT</strong> be overwritten when they log-in)</p>
		<p><input disabled="true" type="checkbox"> <strong> Confirm when logging out </strong>(If checked, users will be <strong>ASKED</strong> to confirm if they want to log-out, when they click the widget/shortcode logout button)</p>
		<p><input disabled type="checkbox"><b> Enable User Analytics </b></p>
		<p><input disabled="true" type="checkbox"> <strong> Allow Restricted Domains </strong>(By default, all domains in <strong>Restricted Domains</strong> field will be restricted. This option will invert this feature by allowing ONLY these domains)</p>

		<table class="mo_oauth_client_mapping_table" style="width:90%">
			<tbody>
			<tr>
				<td><font style="font-size:13px;font-weight:bold;">Restricted Domains </font><br>(Comma separated domains ex. domain1.com,domain2.com etc)
				</td>
				<td><input disabled="true" type="text"placeholder="domain1.com,domain2.com" style="width:100%;" ></td>
			</tr>
			<tr>
				<td><font style="font-size:13px;font-weight:bold;">Custom redirect URL after login </font><br>(Keep blank in case you want users to redirect to page from where SSO originated)
				</td>
				<td><input disabled="true" type="text" placeholder="" style="width:100%;"></td>
			</tr>
			<tr>
				<td><font style="font-size:13px;font-weight:bold;">Custom redirect URL after logout </font>
				</td>
				<td><input disabled="true" type="text" style="width:100%;"></td>
			</tr>
			<tr>
				<td><font style="font-size:13px;font-weight:bold;">Dynamic Callback URL </font></small>
				</td>
				<td><input disabled type="text"  placeholder="Callback / Redirect URI" style="width:100%;"></td>
			</tr>
			<tr></tr><tr>
				<td><input disabled type="checkbox"><font style="font-size:13px;font-weight:bold;"> Enable Single Login Flow </font></small></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td><input disabled="true" type="submit" class="button button-primary button-large" value="Save Settings"></td>
				<td>&nbsp;</td>
			</tr>
		</tbody></table>
	</form>
	</div>

	<?php
}

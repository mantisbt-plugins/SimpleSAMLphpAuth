<?php
# Licensed under the MIT license

require_once( 'core.php' );
require_api( 'authentication_api.php' );
require_api( 'user_api.php' );

$f_username = gpc_get_string( 'username' );
$f_reauthenticate = gpc_get_bool( 'reauthenticate', false );
$f_return = gpc_get_string( 'return', config_get( 'default_home_page' ) );

$t_return = string_url( string_sanitize_url( $f_return ) );

require_once( plugin_config_get( 'autoloader_path' ) );
$t_simplesamlphp_instance = new SimpleSAML_Auth_Simple( plugin_config_get( 'SP_name' ) );
$t_simplesamlphp_instance->requireAuth();
if( $t_simplesamlphp_instance->isAuthenticated() ) {
	$t_simplesamlphp_attributes = $t_simplesamlphp_instance->getAttributes();
    $f_username = $t_simplesamlphp_attributes[ plugin_config_get( 'auth_attributes_username' ) ][0];
}

$t_user_id = is_blank( $f_username ) ? false : user_get_id_by_name( $f_username );

if( $t_user_id == false ) {
	$t_query_args = array(
		'error' => 1,
		'username' => $f_username,
	);

	if( !is_blank( 'return' ) ) {
		$t_query_args['return'] = $t_return;
	}

	if( $f_reauthenticate ) {
		$t_query_args['reauthenticate'] = 1;
	}

	$t_query_text = http_build_query( $t_query_args, '', '&' );

	$t_uri = auth_login_page( $t_query_text );

	print_header_redirect( $t_uri );
}

# Let user into MantisBT
auth_login_user( $t_user_id );

# Redirect to original page user wanted to access before authentication
if( !is_blank( $t_return ) ) {
	print_header_redirect( 'login_cookie_test.php?return=' . $t_return );
}

# If no return page, redirect to default page
print_header_redirect( config_get( 'default_home_page' ) );

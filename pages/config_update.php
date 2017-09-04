<?php
# Licensed under the MIT license

form_security_validate( 'plugin_SimpleSAMLphpAuth_config_update' );

access_ensure_global_level( ADMINISTRATOR );
auth_reauthenticate();

function maybe_set_option( $name, $value ) {
	if ( $value != plugin_config_get( $name ) ) {
		plugin_config_set( $name, $value );
	}
}

maybe_set_option( 'autoloader_path', gpc_get_string( 'autoloader_path' ) );
maybe_set_option( 'SP_name', gpc_get_string( 'SP_name' ) );
maybe_set_option( 'auth_attributes_username', gpc_get_string( 'auth_attributes_username' ) );
maybe_set_option( 'auth_attributes_email', gpc_get_string( 'auth_attributes_email' ) );

form_security_purge( 'plugin_SimpleSAMLphpAuth_config_update' );
print_successful_redirect( plugin_page( 'config_page', true ) );

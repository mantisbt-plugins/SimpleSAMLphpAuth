<?php
# Copyright (c) MantisBT Team - mantisbt-dev@lists.sourceforge.net
# Licensed under the MIT license
require_once( 'core.php' );
require_api( 'authentication_api.php' );

require_once( plugin_config_get( 'autoloader_path' ) );
$t_simplesamlphp_instance = new SimpleSAML_Auth_Simple( plugin_config_get( 'SP_name' ) );
$t_simplesamlphp_instance->logout(config_get( 'path' ) . auth_login_page());

# User is already logged out from Mantis
# TODO: logout from external identity provider

print_header_redirect( auth_login_page(), true, false );

<?php
/*
   Copyright 2011 Michael L. Baker

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.

   Notes: Based on the Time Tracking plugin by Elmar:
   2005 by Elmar Schumacher - GAMBIT Consulting GmbH
   http://www.mantisbt.org/forums/viewtopic.php?f=4&t=589	
*/


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
?>

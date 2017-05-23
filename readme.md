# SimpleSAMLphpAuth Plugin

This is an authentication plugin for SimpleSAMLphp.

The authentication mechanism implemented by this plugin works as follows:
- If user ID is 1 (Administrator), use standard authentication.
- If user is not registered in the db, user standard behavior.
- Otherwise, auto-signin the user without a password.

Users that are auto-signed in, can't manage or use passwords that are stored in the MantisBT database.

## Configuration options
- **autoloader_path** this is the path to the autoloader for simplesaml (eg. /simplesaml/lib/_autoload.php)
- **SP_name** this is the path to the autoloader for simplesaml (eg. default-sp)
- **auth_attributes_username** this is the name of the SAML attribute containing the username of the user
- **auth_attributes_email** this is the name of the SAML attribute containing the email of the user

## Dependencies
MantisBT v2.4.0

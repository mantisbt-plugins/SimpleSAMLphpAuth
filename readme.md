# SimpleSAMLphpAuth Plugin

This is an authentication plugin for SimpleSAMLphp.

The authentication mechanism implemented by this plugin works as follows:
- If users_no_saml config setting is not empty, and contains the user ID, use standard authentication.
- If users_saml config setting is not empty, and **doesn't** contain user ID, use standard authentication.
- If user is not registered in the db, user standard behavior.
- Otherwise, auto-signin the user without a password.

Users that are auto-signed in, can't manage or use passwords that are stored in the MantisBT database.

## Configuration options
- **autoloader_path** this is the path to the autoloader for simplesaml (eg. /simplesaml/lib/_autoload.php)
- **service_provider** this is the name of the service provider for simplesaml (eg. default-sp)
- **auth_attributes_username** this is the name of the SAML attribute containing the username of the user (used for matching user account)
- **auth_attributes_email** this is the name of the SAML attribute containing the email of the user (used for user provisionning)
- **users_no_saml** users (one username per line) to bypass SAML authentication (eg. administrators)
- **users_saml** users (one username per line) for which to use SAML authentication (eg. for testing before deploying to all users)

## Dependencies
MantisBT v2.4.0

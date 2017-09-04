<?php
# Licensed under the MIT license
access_ensure_global_level( ADMINISTRATOR );
auth_reauthenticate();

layout_page_header( plugin_lang_get( 'title' ) . ': ' . plugin_lang_get( 'configuration' ) );
layout_page_begin( 'manage_overview_page.php' );
print_manage_menu( 'manage_plugin_page.php' );
?>

<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container">
<form action="<?php echo plugin_page( 'config_update' ) ?>" method="post">
<fieldset>
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
    <h4 class="widget-title lighter">
        <i class="ace-icon fa fa-exchange"></i>
        <?php echo plugin_lang_get( 'title' ), ': ', plugin_lang_get( 'configuration' ) ?>
    </h4>
</div>
   <?php echo form_security_field( 'plugin_SimpleSAMLphpAuth_config_update' ) ?>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive">
<table class="table table-bordered table-condensed table-striped">
      <tr>
         <td class="category"><?php echo plugin_lang_get( 'config_autoloader_path' ) ?></td>
         <td><input type="text" name="autoloader_path" value="<?php echo plugin_config_get( 'autoloader_path' ) ?>"/></td>
      </tr>
      <tr>
         <td class="category"><?php echo plugin_lang_get( 'config_SP_name' ) ?></td>
         <td><input type="text" name="SP_name" value="<?php echo plugin_config_get( 'SP_name' ) ?>"/></td>
      </tr>
      <tr>
         <td class="category"><?php echo plugin_lang_get( 'config_auth_attributes_username' ) ?></td>
         <td><input type="text" name="auth_attributes_username" value="<?php echo plugin_config_get( 'auth_attributes_username' ) ?>"/></td>
      </tr>
      <tr>
         <td class="category"><?php echo plugin_lang_get( 'config_auth_attributes_email' ) ?></td>
         <td><input type="text" name="auth_attributes_email" value="<?php echo plugin_config_get( 'auth_attributes_email' ) ?>"/></td>
      </tr>
   </table>
</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
    <input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo plugin_lang_get( 'update' ) ?>" />
</div>
</div>
</div>
</fieldset>
</form>
</div>
</div>

<?php
   layout_page_end(); 

<?php

class simpleMailQueuePluginConfiguration extends sfPluginConfiguration
{
  public static function setupMailer()
  {
    // require zend classes explicitly to avoid warnings from Zend_Loader
    set_include_path(sfConfig::get('app_zend_lib_dir').PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('app_zend_lib_dir').'/Zend/Loader.php';
    require_once sfConfig::get('app_zend_lib_dir').'/Zend/Mail.php';
    require_once sfConfig::get('app_zend_lib_dir').'/Zend/Mail/Transport/Smtp.php';

    $config = array(
      'ssl' => sfConfig::get('app_smtp_ssl'),
      'port' => sfConfig::get('app_smtp_port'),
      'auth' => sfConfig::get('app_smtp_auth'),
      'username' => sfConfig::get('app_smtp_username'),
      'password' => sfConfig::get('app_smtp_password'),
    );

    $tr = new Zend_Mail_Transport_Smtp(sfConfig::get('app_smtp_server'), $config);
    Zend_Mail::setDefaultTransport($tr);
  }
}

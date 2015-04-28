<?php return array (
  'base_url' => 'http://gorbanjara.net/socialauth/',
  'networks' => 
  array (
    'facebook' => 
    array (
      'name' => 'Facebook',
      'enabled' => true,
      'keys' => 
      array (
        'key' => '448155102018236',
        'secret' => '4631fb074fb189877121ad0ddfa7392d',
      ),
    ),
    'twitter' => 
    array (
      'name' => 'Twitter',
      'icon_class' => 'fa fa-twitter fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'linkedin' => 
    array (
      'name' => 'Linkedin',
      'icon_class' => 'fa fa-linkedin fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'yahoo' => 
    array (
      'name' => 'Yahoo',
      'icon_class' => 'fa fa-smile-o fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'google' => 
    array (
      'name' => 'Google',
      'enabled' => true,
      'keys' => 
      array (
        'key' => '651044390142-l5v3gackpp5igd2cr7sr5ir30cuqqs64.apps.googleusercontent.com',
        'secret' => '92mC0T53MvEUQxbi_tqRn2St',
      ),
    ),
    'foursquare' => 
    array (
      'name' => 'Foursquare',
      'icon_class' => 'fa fa-foursquare fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'github' => 
    array (
      'name' => 'Github',
      'icon_class' => 'fa fa-github fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'vkontakte' => 
    array (
      'name' => 'VKontakte',
      'icon_class' => 'fa fa-vk fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'instagram' => 
    array (
      'name' => 'Instagram',
      'icon_class' => 'fa fa-instagram fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
    'tumblr' => 
    array (
      'name' => 'Tumblr',
      'icon_class' => 'fa fa-tumblr fa-lg',
      'enabled' => false,
      'keys' => 
      array (
        'key' => '',
        'secret' => '',
      ),
    ),
  ),
  'debug_enabled' => false,
  'log_file' => 'socialauth/error_social_auth.txt',
  'db' => 
  array (
    'enabled' => true,
    'host' => 'localhost',
    'username' => '****',
    'password' => '****',
    'dbname' => '***',
    'tbl_users' => 'users',
    'clmn_user_username' => 'Name',
    'clmn_user_email' => 'EmailAddress',
    'clmn_user_password' => 'Password',
  ),
);
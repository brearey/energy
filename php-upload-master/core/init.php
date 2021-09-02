<?php

session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'id11959245_energyservice',
        'password' => '1v9m8s4t',
        'db' => 'id11959245_energyservice'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 86400
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
);

spl_autoload_register(function($class){
    if(file_exists('classes/' .$class. '.php'))
    {
        require_once 'classes/' .$class. '.php';
    }
});

require_once 'functions/sanitize.php';
require_once 'PhpMailer/vendor/autoload.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name')))
{
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('korisnici_session', array(array('hash', '=', $hash)));
    if($hashCheck->count())
    {
        $user = new User($hashCheck->first()->id_kor);
        $user->login();
    }
}



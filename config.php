<?php

/**
 * --------------------------------------------------
 * DB
 * --------------------------------------------------
**/
if( !defined( 'DB_HOST' ) ) define( 'DB_HOST', 'localhost' );
if( !defined( 'DB_NAME' ) ) define( 'DB_NAME', 'nains' );
if( !defined( 'DB_LOGIN' ) ) define( 'DB_LOGIN', 'root' );
if( !defined( 'DB_PWD' ) ) define( 'DB_PWD', '' );

/**
 * --------------------------------------------------
 * AUTOLOADER
 * --------------------------------------------------
 **/


spl_autoload_register(function($class)
{

    if (strpos($class, 'nains\\') === 0) {
        $class = substr($class, 6);
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    }

    require $class . '.php';
});

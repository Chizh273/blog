<?php


    function __autoload( $class )
    {
        $arr = [ "/classes/", "/controllers/", "/models/", "/views/" ];
        foreach ( $arr as $dir ) {
            if ( file_exists( __DIR__ . $dir . $class . ".php" ) ) {
                require_once __DIR__ . $dir . $class . ".php";
                break;
            }
        }
    }
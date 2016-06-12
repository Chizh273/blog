<?php


    /*
     *Front controller
    */


    session_start();

    error_reporting( E_ALL );

    require_once __DIR__ . "/autoload.php";

    $ctrl = "Controller" . ( isset( $_GET["ctrl"] ) ? $_GET['ctrl'] : "News" );

    try {
        if ( file_exists( __DIR__ . "/controllers/" . $ctrl . ".php" ) )
            $controller = new $ctrl;
        else {
            throw new MyException( "404" );
        }
    } catch( MyException $e ) {
        if ( $e->getMessage() == '404' || $e->getMessage() == '403' ) {
            $controller = new ControllerError( $e->getMessage() );
        } else {
            echo $e->getMessage();
            die;
        }
    }
    $controller->View();
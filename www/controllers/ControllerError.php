<?php


    class ControllerError extends AbstractController
    {
        protected $template;

        public function __construct( $e )
        {
            $this->view = new View();
            $this->template = $e;
            if ( $e == '404' )
                header( "HTTP/1.1 404 Not Found" );
            elseif( $e == '403' ){
                header( "HTTP/1.1 403 Forbidden" );
            }
        }
    }
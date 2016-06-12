<?php


    abstract class AbstractController
    {
        protected $arr = [ ];
        protected $view;
        protected $template;

        public function checkMethodClass( $method )
        {
            $this->arr = array_diff( get_class_methods( get_called_class() ), [ "__construct", "checkMethodClass", "View" ] );
            if ( !array_search( $method, $this->arr ) ) {
                throw new MyException( "404" );
            }
        }

        public function View()
        {
            $this->view->Display( $this->template );
        }
    }
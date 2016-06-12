<?php

    /*
     * @param $date
     * @param $text
     * @param $class
     * */

    class MyException extends Exception
    {
        private $data = [ ];

        public function __set( $name, $value )
        {
            $this->data[ $name ] = $value;
        }

        public function setLog()
        {
            $log = new LogError();
            $log->setLog( implode( " - ", $this->data ) . "\n" );
        }

        public function WriteLog( $date, $text, $class )
        {
            $this->date = "<b>" . $date . "</b>";
            $this->text = $text;
            $this->class = "<i>" . $class . "</i>";
            $this->setLog();
        }

    }
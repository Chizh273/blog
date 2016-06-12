<?php


    class LogError
    {
        static public $path = __DIR__ . "/../log/log.txt";
        
        static public function getLog()
        {
            return file( static::$path, FILE_IGNORE_NEW_LINES );
        }

        public function setLog( $text )
        {
            file_put_contents( static::$path, $text, FILE_APPEND );
        }
    }
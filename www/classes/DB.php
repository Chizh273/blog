<?php

    class DB
    {
        private $dbh;
        private $ClassName = "stdClass";

        public function __construct()
        {
            $arr = parse_ini_file( __DIR__ . "/../config/db.ini" );
            $dsn = "mysql:dbname=" . $arr['db'] . ";host=" . $arr['host'];
            try {
                $this->dbh = new PDO( $dsn, $arr["user"], $arr["pass"] );
                $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            } catch( Exception $e ) {
                $ex = new MyException( "403" );
                $ex->WriteLog( date( 'r', time() ), $e->getMessage(), get_called_class() );
                throw $ex;

            }
        }

        public function SetClassName( $ClassName )
        {
            $this->ClassName = $ClassName;
        }

        public function Query( $sql, $params = [ ] )
        {

            try {
                $sth = $this->dbh->prepare( $sql );
            } catch( Exception $e ) {
                $ex = new MyException( "403" );
                $ex->WriteLog( date( 'r', time() ), $e->getMessage(), get_called_class() );
                throw $ex;
            }

            $res = $sth->execute( $params );

            if ( !$res ) {
                $e = new MyException( "403" );
                $e->WriteLog( date( 'r', time() ), 'Error execute', get_called_class() );
                throw $e;
            }

            return $sth->fetchAll( PDO::FETCH_CLASS, $this->ClassName );
        }

        public function Execute( $sql, $params = [ ] )
        {
            try {
                $sth = $this->dbh->prepare( $sql );
            } catch( Exception $e ) {
                $ex = new MyException( "403" );
                $ex->WriteLog( date( 'r', time() ), $e->getMessage(), get_called_class() );
                throw $ex;
            }


            $res = $sth->execute( $params );

            if ( !$res ) {
                $e = new MyException( "403" );
                $e->WriteLog( date( 'r', time() ), 'Error execute', get_called_class() );
                throw $e;
            }

            return $res;
        }

        public function LastInsertId()
        {
            $res = $this->dbh->lastInsertId();
            if ( !$res ) {
                $e = new MyException( "403" );
                $e->WriteLog( date( 'r', time() ), 'Error lastInsertId', get_called_class() );
                throw $e;
            }

            return $res;
        }
    }
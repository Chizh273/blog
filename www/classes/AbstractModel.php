<?php


    abstract class AbstractModel
    {
        static public $table = "";
        protected $data = [ ];


        public function __set( $name, $value )
        {
            $this->data[ $name ] = $value;
        }

        public function __get( $name )
        {
            return $this->data[ $name ];
        }

        public function __isset( $name )
        {
            return isset( $this->data[ $name ] );
        }

        static public function FindAll()
        {
            $class = get_called_class();
            $sql = "SELECT * FROM `" . static::$table . "` WHERE 1";
            $db = new DB();
            $db->SetClassName( $class );

            $res = $db->Query( $sql );

            /*if ( !$res ) {
                $ex = new MyException( "404" );
                $ex->WriteLog( date( 'r', time() ), "Page not found", get_called_class() );
                throw $ex;
            }*/

            return $res;
        }

        static public function FindByColons( $colons, $value )
        {
            $sql = "SELECT * FROM `" . static::$table . "` WHERE " . $colons . "=:" . $colons;
            $db = new DB();

            $params = [ ":" . $colons => $value ];

            $res = $db->Query( $sql, $params );

            /*if ( !$res ) {
                $ex = new MyException( "404" );
                $ex->WriteLog( date( 'r', time() ), "Page not found", get_called_class() );
                throw $ex;
            }*/

            return $res;
        }

        static public function FindByPK( $id )
        {
            return self::FindByColons( "id", $id );
        }

        protected function Insert()
        {
            $params = [ ];
            foreach ( $this->data as $key => $value ) {
                $params[ ":" . $key ] = $value;
            }

            $sql = 'INSERT INTO `' . static::$table . '`
                    (`' . implode( "`, `", array_keys( $this->data ) ) . '`)
                    VALUES
                    (' . implode( ", ", array_keys( $params ) ) . ')';
            $db = new DB();
            $db->Execute( $sql, $params );
            $this->id = $db->LastInsertId();
        }

        protected function Update()
        {
            $params = [ ];
            $colons = [ ];
            foreach ( $this->data as $key => $value ) {
                $params[ ":" . $key ] = $value;
                if ( $key != 'id' )
                    $colons[] = "`" . $key . "`=:" . $key;
            }
            $sql = 'UPDATE `' . static::$table . '` SET ' . implode( ", ", $colons ) . ' WHERE `id`=:id';
            $db = new DB();
            $db->Execute( $sql, $params );
            //$this->id = $db->LastInsertId();
        }

        public function Delete()
        {
            $params = [ ":id" => $this->id ];
            $sql = 'DELETE FROM `' . static::$table . '` WHERE `id`=:id';
            $db = new DB();
            $db->Execute( $sql, $params );
            // $this->id = $db->LastInsertId();
        }

        public function Save()
        {
            if ( isset( $this->id ) ) {
                $this->Update();
            } else {
                $this->Insert();
            }
        }

    }
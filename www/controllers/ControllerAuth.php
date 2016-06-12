<?php


    class ControllerAuth extends AbstractController
    {
        protected $template;

        public function __construct()
        {
            $this->view = new View();
            $act = 'action' . ( isset( $_GET['action'] ) ? $_GET['action'] : "Auth" );
            $this->checkMethodClass($act);
            $this->$act();
        }

        public function actionAuth()
        {
            $this->template = "auth";
        }

        public function actionLogIn()
        {
            if ( !empty( $_POST['login'] ) && !empty( $_POST['password'] ) ) {
                $user = new UserModel();
                $data = $user->FindByColons( "login", $_POST['login'] );

                if ( empty( $data ) ) {
                    throw new MyException( "Invalid login or password" );
                }
                if ( $data[0]->password == $_POST['password'] ) {
                    $_SESSION['login'] = $data[0]->login;
                    $_SESSION['password'] = $data[0]->password;
                }
                header( 'Location: /' );
                exit;
            }
        }

        public function actionLogOut()
        {
            unset( $_SESSION );
            unset( $_COOKIE );
            session_destroy();
            header( "Location: /" );
            exit;
        }
    }


    
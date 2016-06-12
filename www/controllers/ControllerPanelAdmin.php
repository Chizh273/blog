<?php


    class ControllerPanelAdmin extends AbstractController
    {
        protected $template;

        public function __construct()
        {
            if ( isset( $_SESSION['login'] ) ) {
                $this->view = new View();
                $act = 'action' . ( isset( $_GET['action'] ) ? $_GET['action'] : "PanelAdmin" );
                $this->checkMethodClass( $act );
                $this->$act();
            } else {
                header( "Location: /Auth" );
                exit;
            }
        }

        public function actionAuth()
        {
            $this->template = "auth";
        }

        public function actionPanelAdmin()
        {
            $this->template = "PanelAdmin";
            $this->view->items = NewsModel::FindAll();
            $this->view->log = LogError::getLog();
        }

        public function actionAdd()
        {
            $this->view = new View();
            $this->template = "add";
        }

        public function actionUpdate()
        {
            $this->view = new View();
            $this->template = "update";
            $item = NewsModel::FindByPK( $_GET['id'] );
            if ( empty( $item ) ) {
                throw new MyException( "404" );
            }
            $this->view->item = $item[0];
        }

        public function actionDelete()
        {
            $art = new NewsModel();
            $art->id = $_GET['id'];
            $art->Delete();
            header( "Location: /PanelAdmin" );
            exit;
        }

        public function actionSaveToDB()
        {
            $art = new NewsModel();
            if ( isset( $_POST['id'] ) && !empty( $_POST['id'] ) ) {
                $art->id = $_POST['id'];
            }
            if ( isset( $_POST['title'] ) && !empty( $_POST['title'] ) ) {
                $art->title = $_POST['title'];
            }
            if ( isset( $_POST['text'] ) && !empty( $_POST['text'] ) ) {
                $art->text = $_POST['text'];
            }
            if ( isset( $_POST['author'] ) && !empty( $_POST['author'] ) ) {
                $art->author = $_POST['author'];
            }
            $art->Save();
            header( "Location: /" );
            exit;
        }
    }
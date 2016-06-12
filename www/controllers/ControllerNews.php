<?php


    class ControllerNews extends AbstractController
    {
        protected $template;

        public function __construct()
        {
            $this->view = new View();

            if ( isset( $_GET['id'] ) ) {
                $act = 'actionOne';
            } else {
                $act = 'actionAll';
            }
            $this->checkMethodClass( $act );
            $this->$act();
        }

        public function actionAll()
        {
            $this->template = "all";
            $items = NewsModel::FindAll();
            if ( empty( $items ) ) {
                throw new MyException( "No news" );
            }
            $this->view->items = $items;
        }

        public function actionOne()
        {
            $this->template = "one";
            if ( isset( $_GET['id'] ) ) {
                $item = NewsModel::FindByPK( $_GET['id'] );
                if ( empty( $item ) ) {
                    throw new MyException( "404" );
                }
                $this->view->item = $item[0];
            }
        }
    }
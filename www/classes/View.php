<?php



    class View
    {
        private $data = [];

        public function __set($name, $value)
        {
            $this->data[ $name ] = $value;
        }

        public function __get($name)
        {
            return $this->data[ $name ];
        }

        public function __isset($name)
        {
            return isset($this->data[ $name ]);
        }

        public function Display($template)
        {
            echo $this->Render($template);
        }

        private function Render($template)
        {
            foreach ($this->data as $key => $value) {
                $$key = $value;
            }

            ob_start();
            require_once __DIR__ . "/../views/main.php";
            $content = ob_get_contents();
            ob_clean();

            return $content;
        }


    }
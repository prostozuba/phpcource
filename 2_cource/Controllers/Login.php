<?php

    namespace Controllers;

    class Login extends Client {

        protected $title;
        protected $content;

        public function __construct(){
            parent::__construct();
            $this->render();
        }

}
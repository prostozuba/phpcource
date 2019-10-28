<?php

    namespace Controllers;

    use Core\Template;

    abstract class Base{

        protected $params;
        protected $template;
        protected $templateBuilder;

        public function __construct(){
            $this->templateBuilder = Template::instance();
        }

        public function load($params){
            $this->params = $params;
        }

        public function __call($name, $arguments){
            $this->error404();
        }

        public abstract function render();
        public abstract function error404();
        public abstract function fatalError();

        public function template($path, $params = []){
            return $this->template = $this->templateBuilder->render($path, $params);
        }

    }
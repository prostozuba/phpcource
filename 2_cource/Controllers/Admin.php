<?php

    namespace Controllers;

    class Admin extends Base{

        protected $title;
        protected $content;

        public function __construct(){
            parent::__construct();
            $this->title = '';
            $this->content = '';
        }

        public function render(){
            return $this->template('v_main', [
                'title' => $this->title,
                'content' => $this->content
            ]);

        }

        public function error404(){
            $this->title = 'Ошибка';
            $this->content = $this->template('v_404');
        }
    }
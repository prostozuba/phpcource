<?php

    namespace Controllers;

    use Models\Users;

    class Client extends Base{

        protected $title;
        protected $content;
        protected $user;
        protected $baseTemplate;

        public function __construct(){
            parent::__construct();
            $this->title = '';
            $this->content = '';
            $this->user = (new Users())->getByAuth();
            $this->baseTemplate = 'v_main';
            $this->templateBuilder->addGlobal('root', ROOT);

        }

        public function render()
        {
            return $this->template($this->baseTemplate, [
                'title' => $this->title,
                'content' => $this->content,
                'user' => $this->user
            ]);
        }
            public function error404(){
                //$this->baseTemplate = 'v_content_only';
                $this->title = 'Ошибка';
                $this->content = $this->template('v_404');
            }

            public function fatalError(){
                //$this->baseTemplate = 'v_content_only';
                $this->title = 'OOPS :-(';
                $this->content = $this->template('v_fatal_error', ['e' => $e]);
            }

            public function redirectIfNotAuth(){
                if($this->user === null){
                    header('Location' . ROOT . 'user/login');
                    exit();
                }
            }
    }
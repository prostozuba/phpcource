<?php

    namespace Controllers;

    class Pages extends Client
    {

        public function action_contacts()
        {
            $this->title = 'Контакты';
            $this->content = 'Контакты фирмы';
        }

        public function action_404(){
            $this->error404();
        }
        public function action_fatalError(){
            $this->fatalError();
        }

        public function action_feedback(){
            $this->title = "Обратная связь";
            $this->content = $this->template('v_feedback');
        }
    }
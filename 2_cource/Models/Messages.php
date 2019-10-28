<?php

    namespace Models;

    use Core\Model;

    class Messages extends Model {

        public function __construct(){
            parent::__construct();
            $this->table = 'messages';
            $this->pk = 'id_message';
        }

        protected function validation($fields){

            if ($fields['name'] == '' || $fields['text'] == '') {
                $this->addError('заполните все поля');
            } else {
                if (mb_strlen($fields['name'], 'UTF8') > 32) {
                    $this->addError('имя не может быть больше 32-х символов');
                }
                if (mb_strlen($fields['text'], 'UTF8') > 140) {
                $this->addError('содержание не может быть больше 140 символов');
                }
            }
        }
    }
<?php

    namespace Models;

    use Core\Sql;

    class Comments
    {
        protected $db;
        protected $lastError;

        protected static $instance;

        public static function instance(){
            if(self::$instance == null){
                self::$instance = new self();
            }

            return self::$instance;

        }

        protected function __construct(){
            $this->db = Sql::instance();
            $this->lastError = '';
        }

        public function one($id)
        {
            return $this->db->one('comments', 'id_comment=:id', [
                'id' => $id
            ]);
        }

        public function all()
        {
            return $this->db->all('comments', 'dt');
        }

        public function add($name, $text)
        {
            if (!$this->messageValidate($name, $text)) {
                return false;
            }

            return $this->db->insert('comments', [
                'name' => $name,
                'text' => $text]);
        }

        public function update($id, $name, $text)
        {

            if (!$this->messageValidate($text, $name)) {
                return false;
            }

            $this->db->update('comments',['name' => 'name', 'text' => 'text'],
                'id_comment=:id', [
                'name' => $name,
                'text' => $text,
                'id' => $id]);
            return true;
        }

        public function dell($id){

            $id = (int)$id;
            return $this->db->dell('comments', 'id_comment=:id',
                ['id' => $id]);
        }

        public function messageValidate($name, $text)
        {

            $error = true;

            if ($name == '' || $text == '') {
                $this->lastError = 'заполните все поля';
            } elseif (mb_strlen($name, 'UTF8') > 32) {
                $this->lastError = 'имя не может быть больше 32-х символов';
            } elseif (mb_strlen($text, 'UTF8') > 140) {
                $this->lastError = 'содержание не может быть больше 140 символов';
            } else {
                $error = false;
            }
            return !$error;
        }


        public function lastError(){
            return $this->lastError;
        }
    }
<?php

    namespace Core;

    abstract class Model
    {
        protected $db;
        protected $errors;
        protected $table;
        protected $pk;

        protected static $instance;

//        public static function instance(){
//            if(self::$instance == null){
//                self::$instance = new self();
//            }
//            return self::$instance;
//        }

        public function __construct(){
            $this->db = Sql::instance();
            $this->errors = [];
        }

        public function all(){
            return $this->db->all("$this->table", 'dt');
        }

        public function one($id){

            $res = $this->db->one("$this->table", "$this->pk=:id",
                    ['id' => $id]);
            return $res[0] ?? false;
        }

        public function add($fields){

            $this->validationAdd($fields);

            if(!empty($this->errors)){
                return false;
            }

            return $this->db->insert($this->table, $fields);
        }

        public function update($id, $fields){
            $this->validationUpdate($fields);

            if(!empty($this->errors)){
                return false;
            }
            return $this->db->update($this->table, $fields, "$this->pk=:id",
                ['id' => $id]);
        }

        public function dell($id){
            $id = (int)$id;
            return $this->db->dell("$this->table", "$this->pk=:id",
                ['id' => $id]);
        }

        public function errors(){
            return $this->errors;
        }

        protected function addError($text){
            return $this->errors[] = $text;
        }

        public function validationAdd($fields){
            return $this->validation($fields);
        }

        public function validationUpdate($fields){
            return $this->validation($fields);
        }

        protected abstract function validation($fields);
    }
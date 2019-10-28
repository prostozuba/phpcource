<?php

    namespace Core;

    use Core\Exceptions;
    use PDO;

    class Sql{

        protected static $instance;
        protected $db;

        public static function instance(){
            if(self::$instance == null){
                self::$instance = new self();
            }

            return self::$instance;

        }

        protected function __construct(){
            $this->db = new PDO ('mysql:host=localhost;dbname=phpcource', 'root', '');
            $this->db->exec('SET NAMES UTF8');
        }

        public function select($sql, $params = []){
            return $this->query($sql, $params)->fetchAll();
        }

        public function query($sql, $params = []){

            $query = $this->db->prepare($sql);
            $query->execute($params);

            $this->checkError($query);

            return $query;
        }

        public function lastInsertId(){

            return $this->db->lastInsertId();
        }

        protected function checkError($query)
        {
            $info = $query->errorInfo();

            if ($info[0] != PDO::ERR_NONE) {
                throw new Exceptions\Fatal($info[2]);
            }
        }

        public function all($table, $order){
            $sql ="SELECT * FROM $table ORDER BY $order DESC";

            return $this->select($sql);
        }

        public function one ($table, $where, $whereParams = []){
            $sql = "SELECT * FROM $table WHERE $where";

            return $this->select($sql, $whereParams);

        }

        public function insert($table, $data){

            $keys = [];
            $masks = [];

            foreach ($data as $key => $value) {
                $keys[] = $key;
                $masks[] = ":$key";
            }

            $keyStr = implode(', ', $keys);
            $valuesStr = implode(', ', $masks);

            $sql = "INSERT INTO $table($keyStr) VALUES ($valuesStr)";

            $this->query($sql, $data);

            return $this->lastInsertId();
        }

        public function update($table, $data, $where, $whereParams = []){

            $keys = [];

            foreach ($data as $key => $value) {
                $keys[] = "$key=:$key";
            }

            $keyStr = implode(', ', $keys);

            $sql = "UPDATE $table SET $keyStr WHERE $where";

            $res = array_merge($data, $whereParams);

            return $this->query($sql, $res);
        }

        public function dell($table, $where, $whereParams = [], $limit = 1){

            $sql = "DELETE FROM $table WHERE $where LIMIT $limit";

            $query = $this->query($sql, $whereParams);

            return $query->rowCount() > 0;
        }
    }
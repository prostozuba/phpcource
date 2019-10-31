<?php

    namespace Models;

    use Core\Model;
    use Core\Auth;

    class Users extends Model {

        public function __construct(){
            parent::__construct();
            $this->table = 'users';
            $this->pk = 'id_user';
        }

        public function getByUser($login){
            $res = $this->db->select("SELECT * FROM $this->table WHERE login=:login",
                    ['login' => $login]);
            return $res[0] ?? false;
        }

        public function getByAuth(){
            $token = Auth::getToken();
            $mSession = new Sessions();

            if(!$token){
                return false;
            }

            $session = $mSession->getByToken($token);

            if(!$session){
                Auth::removeToken();
                return false;
            }

            return $this->one($session['id_user']);
        }

        protected function validation($fields){

                if ($fields['login'] == '' || $fields['password'] == '' || $fields['name'] == '') {
                    $this->addError('заполните все поля');
                } else {
                    if (mb_strlen($fields['login'], 'UTF8') < 4)  {
                    $this->addError('логин может быть не менее 4-х символов');
                }   if (mb_strlen($fields['password'], 'UTF8') < 5) {
                        $this->addError('Пароль не может быть меньше 5-ти символов');
                }   if (mb_strlen($fields['name'], 'UTF8') < 15) {
                    $this->addError('Ф.И.О не может быть меньше 15-ти символов');
                }
        }
    }
    }
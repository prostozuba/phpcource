<?php

    namespace Controllers;

    use Core\Auth;
    use Models\Sessions;
    use Models\Users;

    class User extends Login {

        protected $auth;
        protected $mUsers;

        public function __construct(){
            parent::__construct();
            $this->auth = new Auth();
            $this->mUsers = new Users();
        }

        public function action_logout(){
            $this->auth->logout();
            header('Location:' . ROOT . 'user/login');
            exit();
        }
        public function action_login(){

            if (count($_POST) > 0) {

                $fields = [];

                $fields['login'] = trim($_POST['login']);
                $fields['password'] = trim($_POST['password']);
                $remember = isset($_POST['remember']);

                $user = $this->mUsers->getByUser($fields['login']);

                if(is_array($user) && $user['password'] == Auth::hash($fields['password'])){
                    $token = Auth::addToken(isset($remember));
                    $session = new Sessions();
                    $session->add([
                        'id_user' => $user['id_user'],
                        'token' => $token
                    ]);
                    header('Location:' . ROOT . 'messages');
                    exit();
                    }
                else {
                    $errors = $this->mUsers->errors();
                }
            } else {
                $fields = ['login' => '', 'password' => ''];
                $errors = [];
                $remember = '';
            }

            $this->content = $this->template('v_login', [
                'fields' => $fields,
                'remember' => $remember,
                'errors' => $errors
            ]);

        }

        public function action_reg(){

            if(count($_POST) > 0) {

                $fields = [];
                $fields['name'] = trim($_POST['name']);
                $fields['login'] = trim($_POST['login']);
                $fields['password'] = Auth::hash(trim($_POST['password']));

                if ($this->mUsers->add($fields) === false){
                    $errors = $this->mUsers->errors();
                } else {

                    header('Location:' . ROOT . 'user/login/');
                    exit;
                }
            } else {
                $fields = ['login' => '', 'password' => '', 'name' => ''];
                $errors = [];

                $this->content = $this->template('v_reg', [
                    'fields' => $fields,
                    'errors' => $errors
                ]);
            }
            $this->title = 'Регистрация';

            $this->content = $this->template('v_reg', [
                'fields' => $fields,
                'errors' => $errors
            ]);
        }
    }

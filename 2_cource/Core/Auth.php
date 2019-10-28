<?php

    namespace Core;

    use Models\Sessions;

    class Auth{

        protected $loginLastError;

        public function __construct(){
            $this->loginLastError = '';
        }

        public static function logout(){

            $mSession = new Sessions();
            $token = Auth::getToken();
            $getSes = $mSession->getByToken($token);
            $idSes = $getSes['id_session'];

            Auth::removeToken();

            $mSession->dell($idSes);

            $_SESSION['auth'] = false;

            return setcookie('auth', time() - 1, '/');

        }

        public function loginLastError(){
            return $this->loginLastError;
        }

        public static function hash($str){

           /*
            $options = [
                'salt' => 'thisissltforargon2ipasswordhash',
                'memory_cost' => 1024,
                'time_cost' => 2,
                'threads' => 2
            ];

            return password_hash("$str", PASSWORD_ARGON2I, $options);
           */

           $salt = 'saltforsha256';

           return hash('sha256', $str . $salt);

        }

        public static function addToken($remember){

            $token = hash('sha256', time() . mt_rand(0, 1000000));

            $_SESSION['auth'] = $token;

            if ($remember == 'on') {
                setcookie('auth', $token, time() + 3600 * 24 * 14, '/');
            }

            return $token;
        }

        public static function getToken(){
            if(isset($_SESSION['auth'])){
                return $_SESSION['auth'];
            }
            if(isset($_COOKIE['auth'])){
                $_SESSION['auth'] = $_COOKIE['auth'];
                return $_COOKIE['auth'];
            }
            return null;
        }

        public static function removeToken(){

            $_SESSION['auth'] = false;
            setcookie('auth', '', time() - 1, '/');
        }

        public static function passVerify($password, $user){
            if(password_verify($password, $user['password'])) {
                if (password_needs_rehash($user['password'], PASSWORD_ARGON2I)){
                    $hash = password_hash($password, PASSWORD_ARGON2I);

                    return $hash . PHP_EOL;
                }
            }
        }
    }
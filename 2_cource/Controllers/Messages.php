<?php

    namespace Controllers;

    use Models\Messages as Model;
    use Core\Exceptions;

    class Messages extends Client {

        protected $model;

        public function __construct(){
            parent::__construct();
            $this->model = new Model();
        }

        public function action_index(){

            $messages = $this->model->all();

            $templateName = (($_GET['view'] ?? '') == 'table') ? 'v_table' : 'v_index';

            $this->title = 'Главная';

            $this->content = $this->template($templateName, [
                'messages' => $messages
            ]);
        }

        public function action_one(){

            $id = $this->params[2] ?? '';

            $message = $this->model->one($id);

            if($message === false){
                throw new Exceptions\E404('message not found');
            } else{
                $this->title = 'Просмотр одного сообщения';
                $this->content = $this->template('v_one', [
                    'id' => $id,
                    'message' => $message
                ]);
            }
        }

        public function action_add(){
//            $this->redirectIfNotAuth();

            if(count($_POST) > 0) {

                $fields = [];

                $fields['name'] = trim($_POST['name']);
                $fields['text'] = trim($_POST['text']);

                $id = $this->model->add($fields);

                if ($id === false){
                    $errors = $this->model->errors();
                } else {
                    header('Location:' . ROOT . 'messages/one/' . $id);
                    exit;
                }
            } else {
                $fields = ['name' => '', 'text' => ''];
                $errors = [];
            }
            $this->title = 'Новое сообщение';

            $this->content = $this->template('v_add', [
                'fields' => $fields,
                'errors' => $errors
            ]);
        }

        public function action_update(){

            $id = $this->params[2] ?? '';

            if (count($_POST) > 0) {

                $fields = [];

                $fields['name'] = trim($_POST['name']);
                $fields['text'] = trim($_POST['text']);

                $update = $this->model->update($id, $fields);

                if ($update === false){
                    $errors = $this->model->errors();
                } else {
                    header('Location:' . ROOT . 'messages/one/' . $id);
                    exit;
                       }
            } else {
                $fields = ['name' => '', 'text' => ''];
                $errors = [];

                $this->content = $this->template('v_update', [
                    'id' => $id,
                    'fields' => $fields,
                    'errors' => $errors
                ]);

            }

                $message = $this->model->one($id);

                if($message === false){
                    throw new Exceptions\E404('message not found');
                }

                $this->title = 'Редактировать статью';

                $this->content = $this->template('v_update', [
                    'id' => $id,
                    'message' => $message,
                    'fields' => $fields,
                    'errors' => $errors
                ]);
            }

        public function action_delete(){

//          $this->redirectIfNotAuth();
            $id = (int)$this->params[2] ?? '';

            if($id == 0){
                exit();
            }

            if($this->model->dell($id)) {
                header('Location:' . ROOT);
                exit;
            } else {
                throw new Exceptions\E404('message not found');;
            }
        }

    }
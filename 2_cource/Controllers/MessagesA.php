<?php

    namespace Controllers;

    use Models\Messages as Model;
    use Core\Template;

    class MessagesA extends Client {

        protected $model;

        public function __construct(){
            parent::__construct();
            $this->model = new Model();
        }

//        public function action_add(){
//
//            if(count($_POST) > 0) {
//
//                $name = trim($_POST['name']);
//                $text = trim($_POST['text']);
//
//                $id = $this->model->add($name, $text);
//
//                if ($id === false){
//                    $msg = $this->model->lastError();
//                } else {
//                    header('Location:' . ROOT . 'messages/one/' . $id);
//                    exit;
//                }
//            } else {
//                $name = '';
//                $text = '';
//                $msg = '';
//            }
//            $this->title = 'Новое сообщение';
//
//            $this->content = Template::render('v_add', [
//                'title' => $name,
//                'content' => $text,
//                'msg' => $msg
//            ]);
//        }
//
//        public function action_update(){
//
//            $id = $this->params[2] ?? '';
//
//            if (count($_POST) > 0) {
//
//                $name = trim($_POST['name']);
//                $text = trim($_POST['text']);
//
//                if ($this->model->update($id, $name, $text)){
//                    header('Location:' . ROOT . 'messages/one/' . $id);
//                    exit;
//                } else {
//                    $msg = $this->model->lastError();
//                }
//            } else {
//
//                $message = $this->model->one($id);
//
//                if($message === false){
//                    $this->title = 'Ошибка';
//                    $this->content = Template::render('v_404');
//                    return;
//            }
//
//            $this->title = 'Редактировать статью';
//
//            $this->content = Template::render('v_update', [
//                'id' => $id,
//                'message' => $message
//            ]);
//        }}
//
//        public function action_delete(){
//
//            $id = (int)$this->params[2] ?? '';
//
//            if($id == 0){
//                exit();
//            }
//
//            if($this->model->dell($id)) {
//                header('Location:' . ROOT . 'messages');
//                exit;
//            } else {
//                $this->title = 'Ошибка';
//                $this->content = Template::render('v_404');
//            }
//        }
    }
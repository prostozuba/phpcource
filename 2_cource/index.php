<?php

use Core\Template;

session_start();

    include_once 'autoload.php';
    include_once 'config.php';



    $paramsTmp = explode('/', $_GET['queryurl'] ?? '');
    $params = [];

    foreach ($paramsTmp as $p){
        if($p !== ''){
            $params[] = $p;
        }
    }

    $controller = ucfirst($params[0] ?? 'messages');
    $action = 'action_' . ($params[1] ?? 'index');

    $cname = "Controllers\\$controller";

    try {

        if (!class_exists($cname)) {
            $cname = "Controllers\Pages";
            $action = 'action_404';
        }

        $c = new $cname();
        $c->load($params);
        $c->$action();
        $html = $c->render();
        echo $html;
    } catch (Core\Exceptions\E404 $e) {
        $cname = "Controllers\Pages";
        $action = 'action_404';

        $c = new $cname();
        $c->load($params);
        $c->$action();
        $html = $c->render();
        echo $html;
    } catch (\Core\Exceptions\fatal $e){
        $cname = "Controllers\Pages";
        $action = 'fatalError';

        $c = new $cname();
        $c->load($params);
        $c->$action();
        $html = $c->render();
        echo $html;
    } catch (Exception $e){

    }



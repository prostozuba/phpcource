<?php

    namespace Core\Exceptions;


    class Fatal extends Base{

        public function __construct($message = "", $code = 0, $previous = null){

            parent::__construct($message, $code, $previous);

            error_log($this . "\n-----------\n", 3, 'logs/log.txt');
        }
    }
<?php namespace Halofina\Core;

class Exception extends \Exception {
    private $data = array();

    public function __construct($message = "", $code = 0, $data = array())
    {
        $this->data = $data;
        parent::__construct($message, $code, null);
    }

    public function getData(){
        return $this->data;
    }
}
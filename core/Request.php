<?php

namespace Core;

class Request {

    private $params = array();

    public function __construct() {
        if(!defined('STDIN')):
            switch ($_SERVER['REQUEST_METHOD']) {
                case "GET":
                    $this->params = $_GET;
                    break;
                case "POST":
                    $this->params = $this->getPostParams();
                    break;
                default:
                    $this->params = $_GET;
                    break;
            }
        endif;
    }

    public function getParam($key) {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }

        return false;
    }

    public function setParam($key, $value){
        $this->params[$key] = $value;
    }

    public function getPostParams() {
        $query = $this->getQuery();
        $params = $_POST;
        $this->params = array_merge($params, $query);
        return array_unique($this->params);
    }

    public function getQuery() {
        $queryString = explode('&', $_SERVER['QUERY_STRING']);
        foreach ($queryString as $query) {
            list($key, $value) = explode("=", $query);
            $data[$key] = $value;
        }

        return $data;
    }

}

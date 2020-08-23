<?php

namespace app\core;


class RouterCore
{

    private $uri;
    private $method;
    private $getArr = [];

    public function __construct()
    {
        $this->initialize();
        require_once('../app/config/Router.php');
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        $ex = explode('/', $uri);
        $uri = $this->normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->uri = $this->normalizeURI($uri);

    }

    private function get($router, $call)
    {
        $this->getArr = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute(){
        switch($this->method){
            case 'GET':
                $this->executeGET();
            break;
            case 'POST':
                $this->executePOST();
            break;
        }
    }

    private function executeGET(){
        foreach($this->getArr as $get){
            dd($get, false);
        }
    }
    private function executePOST(){

    }

    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}

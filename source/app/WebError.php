<?php
namespace Source\App;
use League\Plates\Engine;

class WebError
{
    private $view;

    public function __construct() {
        $this->view = new Engine(__DIR__.'/../../templates/error', "php");
    }

    public function genericTratamentError($data){
        echo $this->view->render('error', ['codigoDeErro' => $data["errcode"]]);
    }

}
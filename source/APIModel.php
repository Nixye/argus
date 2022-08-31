<?php
namespace Source\Config;


class APIModel {
    public $message;// Mensagem para o Client
    public $fde;    // Folder Destination
    public $status; //Status Code [0=Sucesso | 1=Falha]
    public $type;   //Types [1=Validate | 2=folder | 3=File]
    public $action; //Actions [1=Validate | 2=ls | 3=cd | 4=openFileTXT | 5=openFileIMG | 6=rollback]
    public $key;    //Key from console
    public $result; //Array de Objeto

    /**
     * @return mixed
     */
    public function getMessage() : string{
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage(string $message){
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getStatus() : string{
        return $this->status;
    }

     /**
     * @param mixed $status
     */
    public function setStatus(string $status){
        $this->status = $status;
    }

    /**
     * @param mixed $type
     */
    public function setType(string $type){
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType() : string {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getResult() {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result) {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param mixed $Action
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getFde() {
        return $this->fde;
    }

    /**
     * @param mixed $fde
     */
    public function setFde($fde) {
        $this->fde = $fde;
    }

    /**
     * @return mixed
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key) {
        $this->key = $key;
    }

}
<?php
namespace Source\Config;


class APIModel {
    public $message; // Mensagem para o Client
    public $status; //Status Code [0=Sucesso | 1=Falha]
    public $type;   //Types [1=Validate | 2=folder | 3=File]
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
}
<?php

use League\Plates\Engine;

/**
    * @param string|null $uri
    * @return string Retorna a URL composta pela URI e o caminho informado
    **/
    function url(string $uri = null) : string {
        if ($uri){
            return URL_BASE . "/{$uri}";
        }
        return URL_BASE;
    }

    function set_Cookie(string $cookieName, $cookieValue,  int $sec = 0) {
        $domainHttp = str_replace('http://', "", URL_BASE);
        $domainHttps = str_replace('https://', "", $domainHttp);
        $domain = $domainHttp;
        if ($sec == 0){
            setcookie($cookieName, $cookieValue, 0, "/", $domain);
            return;
        }
        if ($sec > 0)
            setcookie($cookieName, $cookieValue, time() + $sec, "/", $domain);
        else
            setcookie($cookieName, $cookieValue, time() - $sec, "/", $domain);
    }
    function get_Cookie(string $cookieName) {
        if (isset($_COOKIE[$cookieName])){
            return $_COOKIE[$cookieName];
        }
        return null;
    }
    function unset_Cookie(string $cookieName) {
        if (validate_Cookie($cookieName)){
            unset($_COOKIE[$cookieName]);
            set_Cookie($cookieName, null, -1);
        }
    }
    function validate_Cookie(string $cookieName) : bool{
        if (isset($_COOKIE[$cookieName])){
            return true;
        }
        return false;
    }

    function setSession(string $name, $value){
        if(!is_null($name)){
            $_SESSION[$name] = $value;
        }
    }
    function getSession(string $name){
        if (isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return null;
    }
    function validateSession(string $name){
        if (isset($_COOKIE[$name])){
            return true;
        }
        return false;
    }



    function get_date(string $data, string $format = null){
        if (is_null($format))
            $format = 'd/m/Y';
        return date($format, strtotime($data));
    }
    function getLimitedWords(string $text, int $numberWords){
        return substr($text, 0, $numberWords);
    }

    function getIdActualProfile(){
        $idProfile = null;
        $param = http_build_query([
            "id_usuario" => get_Cookie("idUser"),
            "ultimo" => 1
        ]);
        $profiles = (new \Source\Models\Profile())->find("id_usuario = :id_usuario AND ultimo = :ultimo", $param)->limit(1)->fetch(true);
        if ($profiles == null)
            return $idProfile;
        foreach ($profiles as $p){
            $idProfile = $p->id;
        }
        return $idProfile;
    }


    function validateEmails(string $email) : bool{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    function sendResponseAPI(\Source\Config\APIModel $modelo) : string{
        try {
            return json_encode($modelo);
        }catch (\http\Exception\RuntimeException $ex) {
            $novoModelo = new \Source\Config\APIModel();
            $novoModelo->setMessage("Ocorreu algum problema na chamada! Tente novamente mais tarde.");
            $novoModelo->setStatus(1);
            return json_encode($novoModelo);
        }
    }




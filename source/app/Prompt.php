<?php
namespace Source\App;
use League\Plates\Engine;


class Prompt {
    public $view;

/*
 * --> Pages
*/
    public function promptPage(){
        $this->view = new Engine(__DIR__.'/../../templates/prompt', "php");
        $hasLogin = $this->validaSeLoginJaFoiEfetuado();
        echo $this->view->render('prompt', [
            "pageName" => "Agamenon",
            "hasLogin" => $hasLogin
        ]);
    }

/*
 * --> APIs
*/

    public function setInputKey($data){
        $input = $data["input"];
        $modeloRetorno = new \Source\config\APIModel();
        $hasLoginUser = get_Cookie("passLoginUser");
        $hasLoginPassword = get_Cookie("passLoginPassword");
        if (!isset($hasLoginUser)) $hasLoginUser = false;
        if (!isset($hasLoginPassword)) $hasLoginPassword = false;
        if (!$hasLoginUser || !$hasLoginPassword) {
            if ($hasLoginUser == false){
                $modeloRetorno->setType(1);
                if ($this->validaUsuario($input)){
                    set_Cookie("passLoginUser", true);
                    $modeloRetorno->setMessage("Sucesso, agora por favor, insira a <b>Senha</b> de acesso.");
                    $modeloRetorno->setStatus(0);
                } else {
                    set_Cookie("passLoginUser", false);
                    $modeloRetorno->setMessage("Usuario Incorreto, dicade usuario: Ilíada");
                    $modeloRetorno->setStatus(1);
                }
                echo sendResponseAPI($modeloRetorno);
                return;
            }
            if ($hasLoginPassword == false){
                $modeloRetorno->setType(1);
                if ($this->validaSenha($input)){
                    set_Cookie("passLoginPassword", true);
                    $modeloRetorno->setMessage("Sucesso! Direitos ás pastas concedido, para navegar entre elas utilize os comandos, ls (listar) cd (acessar) por exemplo cd documents/pictures, ou digite help a qualquer momento!");
                    $modeloRetorno->setStatus(0);
                } else {
                    set_Cookie("passLoginPassword", false);
                    $modeloRetorno->setMessage("Usuario Incorreto, lembrete da senha de usuario: QWdhbWVub24=");
                    $modeloRetorno->setStatus(1);
                }
                echo sendResponseAPI($modeloRetorno);
                return;
            }
        }

        echo sendResponseAPI($modeloRetorno);
        return;
    }


/*
 * --> Functions
*/
    public function validaSeLoginJaFoiEfetuado(){
        $hasLoginUser = get_Cookie("passLoginUser");
        $hasLoginPassword = get_Cookie("passLoginPassword");
        if (!isset($hasLoginUser)) $hasLoginUser = false;
        if (!isset($hasLoginPassword)) $hasLoginPassword = false;
        if (!$hasLoginUser || !$hasLoginPassword) {
            set_Cookie("passLoginUser", false);
            set_Cookie("passLoginPassword", false);
            return false;
        }
        return true;
    }
    public function validaUsuario($usuario){
        if (strtolower($usuario) == "homero")
            return true;
        return false;
    }
    public function validaSenha($senha){
        if (strtolower($senha) == "agamenon")
            return true;
        return false;
    }


/*
 * --> APIs
*/

    public function sendFiles($data){
        var_dump($data);
        if ($data['file']['name']) {
            if (!$data['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = pathinfo($data['file']['name'], PATHINFO_EXTENSION);
                $filename = $name.'.'.$ext;
                $destination = "/temp/images/".$filename;
                $location = $data["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo url("/temp/images/".$filename);
            } else {
                echo $message = 'Ooops!  Your upload triggered the following error:  '.$data['file']['error'];
            }
        }
    }
    public function alterViewMode($data){
        $novoModelo = new \Source\APIModel();
        if ((new User())->validateActualUser()){
            echo sendResponseAPI((new General_User_Confs())->alterViewMode());
            return;
        }
        $novoModelo->setMessage(getTranslate("NotPermission"));
        $novoModelo->setStatus(1);
        echo sendResponseAPI($novoModelo);
    }
    public function logout($data) : bool {
        unset_Cookie("loginJaEfetuado");
        unset_Cookie("idUser");
        unset_Cookie("enctPassUser");
        unset_Cookie("keepConnected");
        $loginJaEfetuado = get_Cookie("loginJaEfetuado");
        $idUser = get_Cookie("idUser");
        $enctPassUser = get_Cookie("enctPassUser");
        $keepConnected = get_Cookie("keepConnected");
        if(!isset($loginJaEfetuado) && !isset($idUser) && !isset($enctPassUser) && !isset($keepConnected))
            return true;
        return false;
    }

}
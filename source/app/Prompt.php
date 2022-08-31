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
                    $modeloRetorno->setMessage("Usuario Incorreto, dica de usuario: Ilíada");
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
        if (strlen($input) < 1) {
            echo sendResponseAPI($modeloRetorno);
            return;
        }
        $comKeyA = (string)$data["input"][0];
        $comKeyB = (string)$data["input"][1];
        $cData = (string) $comKeyA.$comKeyB;
        if ($cData == "ls"){
            echo ($this->listaDiretorios($data)); return;
        } else if ($cData == "cd"){
            echo ($this->acessaDiretorios($data)); return;
        }
        echo sendResponseAPI($modeloRetorno);
        return;
    }


/*
 * --> Functions
*/
    public function validaSeLoginJaFoiEfetuado() {
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
    public function validaUsuario($usuario) {
        if (strtolower($usuario) == "homero")
            return true;
        return false;
    }
    public function validaSenha($senha) {
        if (strtolower($senha) == "agamenon")
            return true;
        return false;
    }

    public function listaDiretorios($commandData) {
        $modeloRetorno = new \Source\config\APIModel();
        $lsCommands = new \Source\App\Prompt_ls();
        $actualFolder = $commandData["afo"];
        if ($actualFolder == "0") $modeloRetorno = $lsCommands->lsRootDir($commandData); // Root
        else if ($actualFolder == "1") $modeloRetorno = $lsCommands->lsRootProjetosDir($commandData); // Projetos
            else if ($actualFolder == "1.1") $modeloRetorno = $lsCommands->lsRootProjetosArgusDir($commandData); // Argus
                else if ($actualFolder == "1.1.1") $modeloRetorno = $lsCommands->lsRootProjetosArgusNotasDir($commandData); // Notas
                else if ($actualFolder == "1.1.2") $modeloRetorno = $lsCommands->lsRootProjetosArgusRelatosDir($commandData); // Relatos
                else if ($actualFolder == "1.1.3") $modeloRetorno = $lsCommands->lsRootProjetosArgusEvidenciasDir($commandData); // Evidências
                else if ($actualFolder == "1.1.4") $modeloRetorno = $lsCommands->lsRootProjetosArgusEntrevistasDir($commandData); // Entrevistas
        else { $modeloRetorno->setMessage("Diretório não encontrado!"); }

        $modeloRetorno->setType(2);
        $modeloRetorno->setAction(2);
        $modeloRetorno->setStatus(1);
        return sendResponseAPI($modeloRetorno);
    }

    public function acessaDiretorios($commandData) {
        $modeloRetorno = new \Source\config\APIModel();
        $cdCommands = new \Source\App\Prompt_cd();
        $actualFolder = $commandData["afo"];

        if ($actualFolder == "0") $modeloRetorno = $cdCommands->cdRootDir($commandData); // Root
            if ($actualFolder == "1") $modeloRetorno = $cdCommands->cdRootProjectsDir($commandData); // Projetos
                if ($actualFolder == "1.1") $modeloRetorno = $cdCommands->cdRootProjectsArgusDir($commandData); // Argus
                    if ($actualFolder == "1.1.1") $modeloRetorno = $cdCommands->cdRootProjectsArgusNotas($commandData); // Notas
                    if ($actualFolder == "1.1.2") $modeloRetorno = $cdCommands->cdRootProjectsArgusRelatos($commandData); // Relatos
                    if ($actualFolder == "1.1.3") $modeloRetorno = $cdCommands->cdRootProjectsArgusEvidencias($commandData); // Evidências
                    if ($actualFolder == "1.1.4") $modeloRetorno = $cdCommands->cdRootProjectsArgusEntrevistas($commandData); // Entrevistas

        return sendResponseAPI($modeloRetorno);
    }


}
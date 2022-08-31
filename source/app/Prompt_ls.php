<?php
namespace Source\App;
use League\Plates\Engine;


class Prompt_ls {

    public function lsRootDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls ", "ls projetos", "ls projetos/argus", "ls projetos/argus/notas", "ls projetos/argus/relatos", "ls projetos/argus/evidências", "ls projetos/argus/entrevistas" ];
        if (in_array($input, $arrayCommandsProjetos)) {
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("projetos;log.encrypt.cat");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("projetos;log.encrypt.cat");
                    break;
                case $arrayCommandsProjetos[2]: // ls projetos
                    $modeloRetorno->setMessage("projetos/argus;projetos/▄¦▄«;projetos/▄¦▄«;projetos/▄¦▄«");
                    break;
                case $arrayCommandsProjetos[3]: // ls projetos/argus
                    $modeloRetorno->setMessage("projetos/argus/notas;projetos/argus/relatos;projetos/argus/evidências;projetos/argus/entrevistas");
                    break;
                case $arrayCommandsProjetos[4]: // ls projetos/argus/notas
                    $modeloRetorno->setMessage("projetos/argus/notas/nota pesquisa 0.txt;projetos/argus/notas/nota pesquisa 1.txt;projetos/argus/notas/nota pesquisa 2.txt");
                    break;
                case $arrayCommandsProjetos[5]: // ls projetos/argus/relatos
                    $modeloRetorno->setMessage("projetos/argus/relatos/denuncias.pst");
                    break;
                case $arrayCommandsProjetos[6]: // ls projetos/argus/evidências
                    $modeloRetorno->setMessage("projetos/argus/evidências/reliquia.encrypt.png;projetos/argus/evidências/construcao.png;projetos/argus/evidências/subject01.encrypt.png");
                    break;
                case $arrayCommandsProjetos[7]: // ls projetos/argus/entrevistas
                    $modeloRetorno->setMessage("projetos/argus/entrevistas/entrevista 1.encrypt;projetos/argus/entrevistas/entrevista ▄¦▄«");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

    public function lsRootProjetosDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls ", "ls argus", "ls argus/notas", "ls argus/relatos", "ls argus/evidências", "ls argus/entrevistas" ];
        if (in_array($input, $arrayCommandsProjetos)) {
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("argus;▄¦▄«;▄¦▄«;▄¦▄«");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("argus;▄¦▄«;▄¦▄«;▄¦▄«");
                    break;
                case $arrayCommandsProjetos[2]: // ls argus
                    $modeloRetorno->setMessage("argus/notas;argus/relatos;argus/evidências;argus/entrevistas");
                    break;
                case $arrayCommandsProjetos[3]: // ls argus/notas
                    $modeloRetorno->setMessage("argus/notas/nota pesquisa 0.txt;argus/notas/nota pesquisa 1.txt;argus/notas/nota pesquisa 2.txt");
                    break;
                case $arrayCommandsProjetos[4]: // ls argus/relatos
                    $modeloRetorno->setMessage("argus/relatos/denuncias.pst");
                    break;
                case $arrayCommandsProjetos[5]: // ls argus/evidências
                    $modeloRetorno->setMessage("argus/evidências/reliquia.encrypt.png;argus/evidências/construcao.png;argus/evidências/subject01.encrypt.png");
                    break;
                case $arrayCommandsProjetos[6]: // ls argus/entrevistas
                    $modeloRetorno->setMessage("argus/entrevistas/entrevista 1.encrypt;argus/entrevistas/entrevista ▄¦▄«");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

    public function lsRootProjetosArgusDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls ", "ls notas", "ls relatos", "ls evidências", "ls entrevistas" ];
        if (in_array($input, $arrayCommandsProjetos)){
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("notas;relatos;evidências;entrevistas");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("notas;relatos;evidências;entrevistas");
                    break;
                case $arrayCommandsProjetos[2]: // ls notas
                    $modeloRetorno->setMessage("notas/nota pesquisa 0.txt;notas/nota pesquisa 1.txt;notas/nota pesquisa 2.txt");
                    break;
                case $arrayCommandsProjetos[3]: // ls relatos
                    $modeloRetorno->setMessage("relatos/denuncias.pst");
                    break;
                case $arrayCommandsProjetos[4]: // ls evidências
                    $modeloRetorno->setMessage("evidências/reliquia.encrypt.png;evidências/construcao.png;evidências/subject01.encrypt.png");
                    break;
                case $arrayCommandsProjetos[5]: // ls entrevistas
                    $modeloRetorno->setMessage("entrevistas/entrevista 1.encrypt;entrevistas/entrevista ▄¦▄«");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

    public function lsRootProjetosArgusNotasDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls " ];
        if (in_array($input, $arrayCommandsProjetos)){
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("nota pesquisa 0.txt;nota pesquisa 1.txt;nota pesquisa 2.txt");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("nota pesquisa 0.txt;nota pesquisa 1.txt;nota pesquisa 2.txt");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

    public function lsRootProjetosArgusRelatosDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls " ];
        if (in_array($input, $arrayCommandsProjetos)){
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("denuncias.pst");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("denuncias.pst");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

    public function lsRootProjetosArgusEvidenciasDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls " ];
        if (in_array($input, $arrayCommandsProjetos)){
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("reliquia.encrypt.png;construcao.png;subject01.encrypt.png");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("reliquia.encrypt.png;construcao.png;subject01.encrypt.png");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

    public function lsRootProjetosArgusEntrevistasDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ "ls", "ls " ];
        if (in_array($input, $arrayCommandsProjetos)){
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // ls
                    $modeloRetorno->setMessage("entrevista 1;entrevista ▄¦▄«");
                    break;
                case $arrayCommandsProjetos[1]: // ls 
                    $modeloRetorno->setMessage("entrevista 1;entrevista ▄¦▄«");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

}
?>
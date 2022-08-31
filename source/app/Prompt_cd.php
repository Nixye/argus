<?php
namespace Source\App;
use League\Plates\Engine;


class Prompt_cd {

    public function cdRootDir($commandData){
        $modeloRetorno = new \Source\config\APIModel();
        $input = (string)$commandData["input"];
        $arrayCommandsProjetos = [ 
            /*00*/"cd projetos", 
            /*01*/"cd projetos/argus", 
            /*02*/"cd projetos/argus/notas", 
            /*03*/    "cd projetos/argus/notas/nota pesquisa 0.txt",
            /*04*/    "cd projetos/argus/notas/nota pesquisa 1.txt",
            /*05*/    "cd projetos/argus/notas/nota pesquisa 2.txt",
            /*06*/"cd projetos/argus/relatos", 
            /*07*/    "cd projetos/argus/relatos/denuncias.pst",
            /*08*/"cd projetos/argus/evidências", 
            /*09*/    "cd projetos/argus/evidências/reliquia.encrypt.png",
            /*10*/    "cd projetos/argus/evidências/construcao.png",
            /*11*/    "cd projetos/argus/evidências/subject01.encrypt.png",
            /*12*/"cd projetos/argus/entrevistas", 
            /*13*/    "cd projetos/argus/entrevistas/entrevista 1.encrypt",
            /*14*/    "cd projetos/argus/entrevistas/entrevista ▄¦▄«",
            /*15*/"cd log.encrypt.cat"
        ];
        if (in_array($input, $arrayCommandsProjetos)) {
            switch (strtolower($input)){
                case $arrayCommandsProjetos[0]: // cd projetos
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1"); $modeloRetorno->setResult(">#projetos");
                    break;
                case $arrayCommandsProjetos[1]: // cd projetos/argus
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1"); $modeloRetorno->setResult(">#projetos/argus");
                    break;
                case $arrayCommandsProjetos[2]: // cd projetos/argus/notas
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.1"); $modeloRetorno->setResult(">#projetos/argus/notas");
                    break;
                    case $arrayCommandsProjetos[3]: // cd projetos/argus/notas/nota pesquisa 0.txt
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                    case $arrayCommandsProjetos[4]: // cd projetos/argus/notas/nota pesquisa 1.txt
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                    case $arrayCommandsProjetos[5]: // cd projetos/argus/notas/nota pesquisa 2.txt
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                case $arrayCommandsProjetos[6]: // cd projetos/argus/relatos
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.2"); $modeloRetorno->setResult(">#projetos/argus/relatos");
                    break;
                    case $arrayCommandsProjetos[7]: // cd projetos/argus/relatos/denuncias.pst
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                case $arrayCommandsProjetos[8]: // cd projetos/argus/evidências
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.3"); $modeloRetorno->setResult(">#projetos/argus/evidencias");
                    break;
                    case $arrayCommandsProjetos[9]: // cd projetos/argus/evidências/reliquia.encrypt.png
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                    case $arrayCommandsProjetos[10]: // cd projetos/argus/evidências/construcao.png
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                    case $arrayCommandsProjetos[11]: // cd projetos/argus/evidências/subject01.encrypt.png
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                case $arrayCommandsProjetos[12]: // cd projetos/argus/entrevistas
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.4"); $modeloRetorno->setResult(">#projetos/argus/entrevistas");
                    break;
                    case $arrayCommandsProjetos[13]: // cd projetos/argus/entrevistas/entrevista 1.encrypt
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                    case $arrayCommandsProjetos[14]: // cd projetos/argus/entrevistas/entrevista ▄¦▄«
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                        $modeloRetorno->setResult("");
                        break;
                case $arrayCommandsProjetos[14]: // cd log.encrypt.cat
                    $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                    $modeloRetorno->setResult("");
                    break;
            }
        } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
        return $modeloRetorno;
    }

        public function cdRootProjectsDir($commandData) {
            $modeloRetorno = new \Source\config\APIModel();
            $input = (string)$commandData["input"];
            $arrayCommandsProjetos = [ 
                /*00*/"cd argus", 
                /*01*/"cd argus/notas", 
                /*02*/    "cd argus/notas/nota pesquisa 0.txt",
                /*03*/    "cd argus/notas/nota pesquisa 1.txt",
                /*04*/    "cd argus/notas/nota pesquisa 2.txt",
                /*05*/"cd argus/relatos", 
                /*06*/    "cd argus/relatos/denuncias.pst",
                /*07*/"cd argus/evidências", 
                /*08*/    "cd argus/evidências/reliquia.encrypt.png",
                /*19*/    "cd argus/evidências/construcao.png",
                /*10*/    "cd argus/evidências/subject01.encrypt.png",
                /*11*/"cd argus/entrevistas", 
                /*12*/    "cd argus/entrevistas/entrevista 1.encrypt",
                /*13*/    "cd argus/entrevistas/entrevista ▄¦▄«",
                /*14*/"cd .."
            ];
            if (in_array($input, $arrayCommandsProjetos)) {
                switch (strtolower($input)){
                    case $arrayCommandsProjetos[0]: // cd argus
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1"); $modeloRetorno->setResult(">#projetos/argus");
                        break;
                    case $arrayCommandsProjetos[1]: // cd argus/notas
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.1"); $modeloRetorno->setResult(">#projetos/argus/notas");
                        break;
                        case $arrayCommandsProjetos[2]: // cd argus/notas/nota pesquisa 0.txt
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                        case $arrayCommandsProjetos[3]: // cd argus/notas/nota pesquisa 1.txt
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                        case $arrayCommandsProjetos[4]: // cd argus/notas/nota pesquisa 2.txt
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                    case $arrayCommandsProjetos[5]: // cd argus/relatos
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.2"); $modeloRetorno->setResult(">#projetos/argus/relatos");
                        break;
                        case $arrayCommandsProjetos[6]: // cd argus/relatos/denuncias.pst
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                    case $arrayCommandsProjetos[7]: // cd argus/evidências
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.3"); $modeloRetorno->setResult(">#projetos/argus/evidencias");
                        break;
                        case $arrayCommandsProjetos[8]: // cd argus/evidências/reliquia.encrypt.png
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                        case $arrayCommandsProjetos[9]: // cd argus/evidências/construcao.png
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                        case $arrayCommandsProjetos[10]: // cd argus/evidências/subject01.encrypt.png
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                    case $arrayCommandsProjetos[11]: // cd argus/entrevistas
                        $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.4"); $modeloRetorno->setResult(">#projetos/argus/entrevistas");
                        break;
                        case $arrayCommandsProjetos[12]: // cd argus/entrevistas/entrevista 1.encrypt
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                        case $arrayCommandsProjetos[13]: // cd argus/entrevistas/entrevista ▄¦▄«
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                            $modeloRetorno->setResult("");
                            break;
                    case $arrayCommandsProjetos[14]: // cd ..
                        $modeloRetorno->setAction(6); $modeloRetorno->setFde("0"); $modeloRetorno->setResult(">");
                        break;
                }
            } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
            return $modeloRetorno;
        }

            public function cdRootProjectsArgusDir($commandData) {
                $modeloRetorno = new \Source\config\APIModel();
                $input = (string)$commandData["input"];
                $arrayCommandsProjetos = [ 
                    /*00*/"cd notas", 
                    /*01*/    "cd argus/notas/nota pesquisa 0.txt",
                    /*02*/    "cd argus/notas/nota pesquisa 1.txt",
                    /*03*/    "cd argus/notas/nota pesquisa 2.txt",
                    /*04*/"cd relatos", 
                    /*05*/    "cd argus/relatos/denuncias.pst",
                    /*06*/"cd evidências", 
                    /*07*/    "cd argus/evidências/reliquia.encrypt.png",
                    /*08*/    "cd argus/evidências/construcao.png",
                    /*09*/    "cd argus/evidências/subject01.encrypt.png",
                    /*10*/"cd entrevistas", 
                    /*11*/    "cd argus/entrevistas/entrevista 1.encrypt",
                    /*12*/    "cd argus/entrevistas/entrevista ▄¦▄«",
                    /*13*/"cd .."
                ];
                if (in_array($input, $arrayCommandsProjetos)) {
                    switch (strtolower($input)){
                        case $arrayCommandsProjetos[0]: // cd notas
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.1"); $modeloRetorno->setResult(">#projetos/argus/notas");
                            break;
                            case $arrayCommandsProjetos[1]: // cd notas/nota pesquisa 0.txt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[2]: // cd notas/nota pesquisa 1.txt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[3]: // cd notas/nota pesquisa 2.txt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                        case $arrayCommandsProjetos[4]: // cd relatos
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.2"); $modeloRetorno->setResult(">#projetos/argus/relatos");
                            break;
                            case $arrayCommandsProjetos[5]: // cd relatos/denuncias.pst
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                        case $arrayCommandsProjetos[6]: // cd evidências
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.3"); $modeloRetorno->setResult(">#projetos/argus/evidencias");
                            break;
                            case $arrayCommandsProjetos[7]: // cd evidências/reliquia.encrypt.png
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[8]: // cd evidências/construcao.png
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[9]: // cd evidências/subject01.encrypt.png
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                        case $arrayCommandsProjetos[10]: // cd entrevistas
                            $modeloRetorno->setType(2); $modeloRetorno->setAction(3); $modeloRetorno->setFde("1.1.4"); $modeloRetorno->setResult(">#projetos/argus/entrevistas");
                            break;
                            case $arrayCommandsProjetos[11]: // cd entrevistas/entrevista 1.encrypt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[12]: // cd entrevistas/entrevista ▄¦▄«
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                        case $arrayCommandsProjetos[13]: // cd ..
                            $modeloRetorno->setAction(6); $modeloRetorno->setFde("1"); $modeloRetorno->setResult(">#projetos");
                            break;
                    }
                } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
                return $modeloRetorno;
            }

                public function cdRootProjectsArgusNotas($commandData) {
                    $modeloRetorno = new \Source\config\APIModel();
                    $input = (string)$commandData["input"];
                    $arrayCommandsProjetos = [ 
                        /*00*/ "cd nota pesquisa 0.txt",
                        /*01*/ "cd nota pesquisa 1.txt",
                        /*02*/ "cd nota pesquisa 2.txt",
                        /*03*/ "cd .."
                    ];
                    if (in_array($input, $arrayCommandsProjetos)) {
                        switch (strtolower($input)){
                            case $arrayCommandsProjetos[0]: // cd nota pesquisa 0.txt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[1]: // cd nota pesquisa 1.txt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[2]: // cd nota pesquisa 2.txt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[3]: // cd ..
                                $modeloRetorno->setAction(6); $modeloRetorno->setFde("1.1"); $modeloRetorno->setResult(">#projetos/argus");
                                break;
                        }
                    } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
                    return $modeloRetorno;
                }

                public function cdRootProjectsArgusRelatos($commandData) {
                    $modeloRetorno = new \Source\config\APIModel();
                    $input = (string)$commandData["input"];
                    $arrayCommandsProjetos = [ 
                        /*00*/ "cd denuncias.pst",
                        /*01*/ "cd .."
                    ];
                    if (in_array($input, $arrayCommandsProjetos)) {
                        switch (strtolower($input)){
                            case $arrayCommandsProjetos[0]: // cd denuncias.pst
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[1]: // cd ..
                                $modeloRetorno->setAction(6); $modeloRetorno->setFde("1.1"); $modeloRetorno->setResult(">#projetos/argus");
                                break;
                        }
                    } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
                    return $modeloRetorno;
                }

                public function cdRootProjectsArgusEvidencias($commandData) {
                    $modeloRetorno = new \Source\config\APIModel();
                    $input = (string)$commandData["input"];
                    $arrayCommandsProjetos = [ 
                        /*00*/ "cd reliquia.encrypt.png",
                        /*01*/ "cd construcao.png",
                        /*02*/ "cd subject01.encrypt.png",
                        /*03*/ "cd .."
                    ];
                    if (in_array($input, $arrayCommandsProjetos)) {
                        switch (strtolower($input)){
                            case $arrayCommandsProjetos[0]: // cd reliquia.encrypt.png
                                $modeloRetorno->setType(3); $modeloRetorno->setAction(5);
                                $imageLines = array();
                                $fh = fopen(URL_BASE.'/resources/texts/argus/evidências/reliquia.encrypt.png.txt', 'r');
                                while ($line = fgets($fh)) { $imageLines[] = $line; }
                                fclose($fh);
                                $modeloRetorno->setResult($imageLines);
                                break;
                            case $arrayCommandsProjetos[1]: // cd construcao.png
                                $modeloRetorno->setType(3); $modeloRetorno->setAction(5);
                                $imageLines = array();
                                $fh = fopen(URL_BASE.'/resources/texts/argus/evidências/construcao.png.txt', 'r');
                                while ($line = fgets($fh)) { $imageLines[] = $line; }
                                fclose($fh);
                                $modeloRetorno->setResult($imageLines);
                                break;
                            case $arrayCommandsProjetos[2]: // cd subject01.encrypt.png
                                $modeloRetorno->setType(3); $modeloRetorno->setAction(5);
                                $imageLines = array();
                                $fh = fopen(URL_BASE.'/resources/texts/argus/evidências/subject01.encrypt.png.txt', 'r');
                                while ($line = fgets($fh)) { $imageLines[] = $line; }
                                fclose($fh);
                                $modeloRetorno->setResult($imageLines);
                                break;
                            case $arrayCommandsProjetos[3]: // cd ..
                                $modeloRetorno->setAction(6); $modeloRetorno->setFde("1.1"); $modeloRetorno->setResult(">#projetos/argus");
                                break;
                        }
                    } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
                    return $modeloRetorno;
                }

                public function cdRootProjectsArgusEntrevistas($commandData) {
                    $modeloRetorno = new \Source\config\APIModel();
                    $input = (string)$commandData["input"];
                    $arrayCommandsProjetos = [ 
                        /*00*/ "cd entrevista 1.encrypt",
                        /*01*/ "cd entrevista ▄¦▄«",
                        /*02*/ "cd .."
                    ];
                    if (in_array($input, $arrayCommandsProjetos)) {
                        switch (strtolower($input)){
                            case $arrayCommandsProjetos[0]: // cd entrevista 1.encrypt
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[1]: // cd entrevista ▄¦▄«
                                $modeloRetorno->setType(2); $modeloRetorno->setAction(4);
                                $modeloRetorno->setResult("");
                                break;
                            case $arrayCommandsProjetos[2]: // cd ..
                                $modeloRetorno->setAction(6); $modeloRetorno->setFde("1.1"); $modeloRetorno->setResult(">#projetos/argus");
                                break;
                        }
                    } else { $modeloRetorno->setMessage("Diretório não encontrado!"); }
                    return $modeloRetorno;
                }
}
?>
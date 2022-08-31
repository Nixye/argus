<?php
$this->layout('template', [
    "title" => $pageName,
    "hasLogin" => $hasLogin
]);
?>

<div id = "background">
    <div id = "console">
        <div>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Ola, bem vindo ao ARC</p>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Permita-me me apresentar, sou Ganaberal, IA que controla a gestao de todos os recursos de pesquisa.</p>
            <?php
            if(!$hasLogin){
            ?>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Por favor, digite o <b>Login</b>.</p>
            <?php
            }else{
            ?>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Você já está logado! Direitos ás pastas concedido, para navegar entre elas utilize os comandos, ls (listar) cd (acessar) por exemplo cd documents/pictures.</p>
            <?php
            }
            ?>
        </div>
        <div id="lastCommands"></div>
        <div id="prpCF">
            <b id="greenSet">></b>
            <textarea rows="1" id="command"></textarea>
        </div>
    </div>
</div>
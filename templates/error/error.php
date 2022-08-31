<?php
$this->layout('template',[
    "codigoDeErro" => $codError
]);
$urlBase = URL_BASE;
?>

<div id = "background">
    <div id = "console">
        <div>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Ola, Parece que houve um problema [<?=$codigoDeErro?>]</p>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> <a href="<?=$urlBase?>">Tente reconectar</a>.</p>
        </div>
    </div>
</div>
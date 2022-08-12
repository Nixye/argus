<?php
$this->layout('template',[
    "codigoDeErro" => $codError
]);
?>

<div id = "background">
    <div id = "console">
        <div>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Ola, Parece que houve um problema [<?=$codError;?>]</p>
            <p id="lastCommand"> <b id="greenSetNoAnimation">> </b> Tente reconectar.</p>
        </div>
    </div>
</div>
<?php
ob_start();
require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

                            /* Controllers */
$router->namespace("Source\App");

                            /*APIs*/
/*General APIs*/
$router->group("promptCommands");
$router->post("/inputKey", "Prompt:setInputKey");

                            /*Pages*/
/* PROMPT */
$router->group(null);
$router->get("/", "Prompt:promptPage");


                            /*Error Treatment*/
/* Errors */
$router->group("ooops");
$router->get("/{errcode}", "WebError:genericTratamentError");



/* Comandos Padrões */
$router->dispatch();
if ($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}
ob_end_flush();
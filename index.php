<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;
$router = new Router(URL_BASE);

                            /* Controllers */
$router->namespace("Source\App");


                            /*Pages*/
/* PROMPT */
$router->group(null);
$router->get("/", "Prompt:promptPage");


                            /*APIs*/
/*General APIs*/
$router->group("promptCommands");
$router->post("/inputKey", "Prompt:setInputKey");


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
<?php
    include_once "autoload.php";

    //diretório do projeto
    define ("APP", "http://localhost/sistemaChat/");

    $url = !isset($_GET['url']) ? "index/index" : $_GET['url'];

    $parametros = explode('/', $url);

    $nomeControlador = ucfirst($parametros[0])."Controller";

    $acao = $parametros[1];

    if (count($parametros) > 2) {
        $id = $parametros[2];
        $controller = new $nomeControlador();
        $controller->$acao($id);
    } else {
        $controller = new $nomeControlador();
        $controller->$acao();
    }
 ?>

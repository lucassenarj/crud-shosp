<?php
if (!isset($_SESSION))
    session_start(); //Inicia a Sessão

function __autoload($class_name) {
    $classe = "includes/classes/" . $class_name . ".php";

    if (file_exists($classe)):
        include_once ($classe);
    elseif(file_exists("../".$classe)):
        include_once ("../".$classe);
    else:
        echo "A classe {$classe} n&atilde;o existe.";
    endif;
}

//Instancia a classe Paciente
$dadosPaciente  = new Paciente();

//Instancia a classe Planos
$dadosPlanos    = new Planos();
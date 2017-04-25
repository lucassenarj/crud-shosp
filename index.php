<?php
if (!isset($_SESSION)) :
    session_start(); //Inicia a Sessao
endif;

require_once "config/config.php";
require_once CLASSES_CONFIG;
require_once DB_CONFIG;

if(empty($_GET['act'])){
    $title = 'Bem vindo!';
    include(HOME);
} else if($_GET['act'] == 'plano') {
    $title = 'Plano de Saúde!';
    include(PLANO);
}else if($_GET['act'] == 'cadastrarplanos') {
    $title = 'Cadastrar Plano de Saúde';
    include(CADPLANO);
}else if($_GET['act'] == 'planos') {
    $title = 'Planos Cadastrados';
    include(PLANOS);
}else if($_GET['act'] == 'apagaplano') {
    $id = $_GET['id'];
    $dadosPlanos->apagaPlano($pdo, $id);
    header('Location: index.php?act=planos');
}else if($_GET['act'] == 'cadastrapacientes') {
    $title = 'Cadastrar Pacientes';
    include(CADPACIENTE);
}else if($_GET['act'] == 'pacientes') {
    $title = 'Pacientes Cadastrados';
    include(PACIENTES);
}else if($_GET['act'] == 'paciente') {
    $title = 'Paciente';
    include(PACIENTE);
}else if($_GET['act'] == 'apagapaciente') {
    $id = $_GET['id'];
    $dadosPaciente->apagaPaciente($pdo, $id);
    header('Location: index.php?act=pacientes');
}
?>
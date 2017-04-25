<?php
if (!isset($_SESSION))
    session_start(); //Inicia a Sessao

header("Content-type: text/html; charset=UTF-8");
setlocale(LC_ALL, "pt_BR");  
date_default_timezone_set('America/Sao_Paulo');

define('WWW_ROOT'               , dirname(__DIR__)                      );
define('BASEURL'                , DIRECTORY_SEPARATOR                   );

define("INCLUDES"               , WWW_ROOT  . "/includes"               );
define("CLASSES"                , INCLUDES  . "/classes/"               );
define("CLASSES_CONFIG"         , INCLUDES  . "/classes/_classes.php"   );
define("DB"                     , INCLUDES  . "/db/"                    );
define("HOME"                   , INCLUDES  . "/pages/home.php"         );
define("PLANO"                  , INCLUDES  . "/pages/plano.php"        );
define("PLANOS"                 , INCLUDES  . "/pages/planos.php"       );
define("CADPLANO"               , INCLUDES  . "/pages/cadplanos.php"    );
define("CADPACIENTE"            , INCLUDES  . "/pages/cadpacientes.php" );
define("PACIENTES"              , INCLUDES  . "/pages/pacientes.php"    );
define("PACIENTE"               , INCLUDES  . "/pages/paciente.php"     );

define("DB_CONFIG"              , DB       . "conexao_pdo.php"          );

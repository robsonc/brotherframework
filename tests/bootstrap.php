<?php

//Seta o diretorio principal da aplicação
if(!defined('APPLICATION_PATH')) define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../core'),
    get_include_path()
)));

//require_once APPLICATION_PATH . '/configs/config.php';
require_once 'PHPUnit/Autoload.php';
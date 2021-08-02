<?php
ob_start();

session_start();
require_once 'helpers/Helpers.php';
require_once 'autoload.php';
require_once 'config/ConfigBD.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



function showError(){
	$error = new ErrorController();
	$error->index();
}

//Preguntamos si existe el parametro controller por la url
if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';
} elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = controller_default;
} else{
	showError();
	exit();
}


//Despues pregunto si existe una clase llamada igual al parametro del controlador
if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador(); //Creo un objeto de esa clase
	
	//Ahora pregunto si existe por url el parametro action y verifico que exista ese mismo metodo en la clase
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action(); //Ejecuto el metodo
	} elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();//Ejecuto el metodo por default
	} else{
		showError();
	}
}else{
	showError();
}

require_once 'views/layout/footer.php';

ob_end_flush();
?>

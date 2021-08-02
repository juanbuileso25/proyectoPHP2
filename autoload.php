<?php

//Esta función me sirve para generar includes de forma dinamica y no estar haciendolo de forma manual
//donde se necesite.

function controllers_autoload($classname){
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_autoload');
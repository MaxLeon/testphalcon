<?php 

/**
 *  haciendo el esqueleto manual de phalcon.
 *	archivo index en la calpeta public que se encarga de inicializar todo lo del proyecto segun ellos calificado como el bootstrap
 *  index.php
 * @category Phalcon
 * @package  Public
 * @author   Maximo De Leon <maximo@mctekk.com>
 * @version  "CVS: 5.5"
 * @link     http://phalcontest.com/index.php
 */

/**
 * Cargando las clases correscondientes a usar de phalcon
 */

use Phalcon\Loader;
use Phalcon\Tag;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

/**
 * Creando objetos...
 */

/**
 * Creando el loader
 */

$loader = new Loader();
$loader->registerDirs(array('../app/controllers','../app/models'))->register();

/**
 * Creando el inyector de dependencia
 */

$di = new FactoryDefault();

/**
 * inyectando los servicios dentro del dependency inyector
 */

/**
 * Setteando la DB
 * Se crea un apadtador para manejar la base de datos y las credenciales son pasadas como un arreglo
 */
$di['db'] = function(){return new DbAdapter(array("host" => "192.168.17.129",
 												  "username" => "maximo",
 												  "password" => "1234",
 												  "dbname" => "phalcontest"))};

/**
 * Setteando los Views
 * Se crea el objeto que contendra las vistas
 * Se mapea la calpeta de las vistas
 * Se retorna el contenedor
 */
$di['view'] = function(){
	$view = new View(); 
	$view->setViewsDir('../app/views/');
	return $view;};

$di['url'] = function(){
	$url = new Url();
	$url->setBaseUri('/');
	return $url;
};
?>
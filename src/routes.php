<?php

use Proto\Data;

const ROUTE_DEBUG = true;

// Routes

$app->get('/[{controller}[/{action}[/{id}]]]', function ($request, $response, $args) {
	
	$model = [];
	$loader = new Twig_Loader_Filesystem( __DIR__ . '/../views');
	$twig = new Twig_Environment($loader);
	
	$args = array_filter($args, function($v,$k){
		return !(strpos($v, 0, 1) === '?');
	}
	);
	
	
	if(!isset($args['controller']))
			$args['controller'] = 'root';
	if(!isset($args['action']))
			$args['action'] = 'index';
	array_walk($args, function(&$item, $k){
		$item = strtolower($item);
	}
	);
	
	$args['pagePath'] = join(DIRECTORY_SEPARATOR,  ['pages', $args['controller'] == 'root' ? null : $args['controller'], $args['action']]) . '.html';
	$model = array_merge($args, $model);
	$model['Nav'] = Proto\Data\NavData::getItems();
	
	if(ROUTE_DEBUG === true){
		return $twig->render($args['pagePath'], $model);
	}
	else{
		try{
			return $twig->render($args['pagePath'], $model);
		}
		catch(Exception $e){
			return HttpNotFound($twig);
		}
	}
	
	
}
);



function HttpNotFound($twig){
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
	return $twig->render('pages/404.html', []);
}

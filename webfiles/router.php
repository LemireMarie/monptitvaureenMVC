<?php

function get(string $route, callable $callback)
{
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		route($route, $callback);
	}
}
function post(string $route, callable $callback)
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		route($route, $callback);
	}
}
function put(string $route, callable $callback)
{
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		route($route, $callback);
	}
}
function patch(string $route, callable $callback)
{
	if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
		route($route, $callback);
	}
}
function delete(string $route, callable $callback)
{
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		route($route, $callback);
	}
}
function any(string $route, callable $callback)
{
	route($route, $callback);
}
function route(string $route, callable $callback)
{	
	//récupére l'url
	$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
	//supprime le dernier "/" s'il existe
	$request_url = rtrim($request_url, '/');
	//retire "?" et ce qu'il a après
	$request_url = strtok($request_url, '?');
	//retourne un array composé des string séparés par un "/"
	//pour l'url passée en paramètre de la fonction
	$route_parts = explode('/', $route);
	//retourne un array composé des string séparés par un "/"
	//pour l'url entrée par l'utilisateur
	$request_url_parts = explode('/', $request_url);
	//retire le premier élément du tableau
	array_shift($route_parts);
	array_shift($request_url_parts);
	//appel de la fonction callback si l'url est juste "/"
	if ($route_parts[0] == '' && count($request_url_parts) == 0) {
		call_user_func_array($callback, []);
		exit();
	}
	//si il n'y a pas de concordance sur le nb de valeur 
	//des tableaux ça return et plus rien ne se passe
	if (count($route_parts) != count($request_url_parts)) {
		return;
	}
	$parameters = [];
	//boucle sur chaque string qui a été explode
	for ($i = 0; $i < count($route_parts); $i++) {
		//si le route_parts actuel commence par"$"
		//alors il s'agit d'un paramètre dynamique 
		//(ex: $id peut être de n'importe quel valeur)
		if (preg_match("/^[$]/", $route_parts[$i])) {
			array_push($parameters, $request_url_parts[$i]);
		//si la route issue de route.php != de l'url du navigateur
		//alors ça s'arrête
		} else if ($route_parts[$i] != $request_url_parts[$i]) {
			return;
		}
	}
	//si les2 url sont les même alors la fct callback 
	//est appelée et on lui passe les param
	call_user_func_array($callback, $parameters);
	exit();
}




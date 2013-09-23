<?php 
require "vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

define("RD", __DIR__);
define("CONFIG_RD", __DIR__ . '/config/');

$collection = new Routing\RouteCollection();
$collection->add('barget2013', new Routing\Route('/bar/get/{year}', array('year' => '2013')));
$collection->add('bye', new Routing\Route('/bye'));
$collection->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));

$request = Request::createFromGlobals();

$context = new Routing\RequestContext();
$context->fromRequest($request);

$matcher = new Routing\Matcher\UrlMatcher($collection, $context);
try {
	$matcher->match($request->getPathInfo());
	$response = new Response('Hi');	
} catch (Routing\Exception\ResourceNotFoundException $e) {
	$response = new Response('Not found', 404);
} catch (Exception $e) {
	$response = new Response('An error occured!', 500);
}

$response->send(); 
// $request_uri = $_SERVER['REQUEST_URI'];
// $script_name = $_SERVER['SCRIPT_NAME'];

// echo strlen($script_name);
// $uri = substr($request_uri, strlen($script_name));
// dump($request_uri, false);
//  dump($script_name, false);
// dump($uri, true);

/*
$path = explode('/', $path);
// var_dump($path);

if($path[1] == 'bar') {
	require RD . '/views/'.$path[1].'.php';
} */
// $response = new Response();
// $response->setContent('You said Class is '. $path[1] .' Method is '. $path[2] . ' Passing Value is ' . $path[3]);
// $response->send();
/*
$nconfig = new Config;

$ndbname = $nconfig->database('db.name');

$config = Config::database('dbname');
*/

?>
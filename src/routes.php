<?php 
/*
$app->get('barget2013', '/bar/get/{year}', array('year' => '2013'));
$app->get('hello', '/hello');
$app->get('bye', '/bye');
*/

use Illuminate\Database\Capsule\Manager as DB;
use \Models;

$app->get('/', function() use ($app) {
	$user = DB::table('user')->get();
	dump($user);
	return "Hello from Home Page";
});

$app->get('/twig', function() use($app) {
	$products = Models\Product::get()->toArray();
	return $app['twig']->render('bar.twig', array(
        'products' => $products,
    ));
});

$app->get('/user', function() {
	$user = Models\User::get()->toArray();
	dump($user);
	return true;
});

$app->get('/product', function() {
	$product = Models\Product::get()->toArray();
	dump($product);
	return true;
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});
$app->get('/bye', function(){
	$array = array(
		'name' => 'Test'
		);
	return json_encode($array);
});
$app->get('/hi', function(){
	return "Hello World!";
});

$app->get('/test', function(){
	call_user_func('test');
});

function test() {
	echo "Hello World from Test!";
}

$app->get('/home', 'Controllers\HomeController::index');
$app->get('/home/test', 'Controllers\HomeController::test');
?>
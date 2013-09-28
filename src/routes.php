<?php 
/*
$app->get('barget2013', '/bar/get/{year}', array('year' => '2013'));
$app->get('hello', '/hello');
$app->get('bye', '/bye');
*/
/*
https://github.com/phpcrazy/wpa9chart
composer
route
Config Loader
Dependency Injection
Route Resolving
Controller Resolving
Model
AngularJS
*/

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});
$app->get('/bye', function(){
	return "Bye";
});
$app->get('/hi', function(){
	return "Hello World!";
});
?>
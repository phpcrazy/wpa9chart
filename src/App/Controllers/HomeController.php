<?php 
namespace Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController {
	function index(Request $request, Application $app) {
		return "Hello World from Controller!";
	}

	function test(Request $request, Application $app) {
		return "Hello form HomeController Test";
	}
}

 ?>
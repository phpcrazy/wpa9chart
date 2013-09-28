<?php 

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Pimple;

class Application extends Pimple {

	public function __construct(){
		$this['request'] = Request::createFromGlobals();
		$this['collection'] = $this->share(function(){
			return new Routing\RouteCollection();
		});
		$this['context'] = $this->share(function(){
			return new Routing\RequestContext();
		});
	}

	public function requestResolver() {
		$this['context']->fromRequest($this['request']);
	}

	public function get($name, $pattern, $value = null) {
		if($value == null) {
			$this['collection']->add($name, new Routing\Route($pattern));			
		} else {
			$this['collection']->add($name, new Routing\Route($pattern), $value);
		}
	} 

	public function ContextMatcher() {
		$this['matcher'] = new Routing\Matcher\UrlMatcher($this['collection'], $this['context']);
		$matcher = $this['matcher'];
		try {
			$matcher->match($this['request']->getPathInfo());
			$this['response'] = new Response('Hi');	
		} catch (Routing\Exception\ResourceNotFoundException $e) {
			$this['response'] = new Response('Not found', 404);
		} catch (Exception $e) {
			$this['response'] = new Response('An error occured!', 500);
		}
	}

	public function run() {
		$this['response']->send();
	}
} 

 ?>
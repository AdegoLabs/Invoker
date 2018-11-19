<?php

namespace XHEAct;

use Invoker\Invoker as Invoker;

class XHEAct {
	public $invoker;

	function __construct(Invoker $invoker) {
		$this->invoker = $invoker;
	}

	function getXHE($getMethodName, $args) {		
		return ($this->invoker = ($this->{'get_by_' . $getMethodName}($args)));	
	}

	function setXHE($setMethodName, $args) {		
		return ($this->{'set_' . $setMethodName}($args));	
	}

	function __call($method, $args) {
		list($argv) = $args;

		if ( is_array($argv))
			$args = $argv;
		
		return $this->invoker->{$method}(...$args);
	}
	
}

<?php

namespace Invoker;

use StdClass;

class Invoker extends StdClass {
    private $_obj = null;

    public function __clone() {
    	return new Invoker($this->getObj());
    }

    private static $_instance;

    public static function instance(){

      if(!isset(self::$_instance)) {
        self::$_instance = new MyGlobals();
      }
      return self::$_instance;
    }

    public function __construct($obj = null) {
    	if ($obj !== null)
    		$this->setObj($obj);
    }

    public function getObj() {
    	return $this->_obj;
    }

    public function setObj($obj) {
    	$this->_obj = $obj;
    }

    public function __call($method, $args = array()) {
    	try {
    		$obj = $this->getObj();    		
		global $$obj;

    		if (method_exists($obj, $method)) {
    			global $obj;

    			return call_user_func_array(
	            		array($obj, $method), $args
	        	);
    		} elseif (method_exists($$obj, $method)) {
    			return call_user_func_array(
	            		array($$obj, $method), $args
	        	);
    		} elseif(function_exists($method)) {
    			return call_user_func_array(
	            		array($method), $args
	        	);
    		} else {return;}
    	} catch (Exception $e) {
    		throw new Exception('Caught exception: ',  $e->getMessage(), "\n");
	}
    }

    public function __invoke($method, array $args = array()) {
    	if (func_num_args() > 1 ) {
    		return call_user_func_array(
            		array($this, $method), $args
    		);
    	} else {
    		$this->setObj($method);
    	}
    }
}

?>

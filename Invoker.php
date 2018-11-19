<?php
class Invoker extends StdClass{
    private $_obj = null;

    public function __clone() {
    	return clone Invoker($this->getObj);
    }

    private static $_instance;

    public static function instance(){

      if(!isset(self::$_instance)) {
        self::$_instance = new MyGlobals();
      }
      return self::$_instance;
    }

    public function __construct($obj = null) {
    	$this->setObj($obj);
    }

    public function getObj() {
    	if (!is_null($this->_obj))
    		return $this->_obj;
    }

    public function setObj($obj = null) {
    	if (!is_null($obj))
    		$this->_obj = $obj;
    }

    public function __call($method, $args = array()) {
    	$obj = $this->getObj();
    	
    	try {
    		global $$obj;

    		return call_user_func_array(
	            array($$obj, $method),
	            $args
	        );
    	} catch (Exception $e) {
    		throw new Exception('Caught exception: ',  $e->getMessage(), "\n");
		}
    }

    public function __invoker($method, $args = array()) {

    	if (func_num_args() > 1 ) {

    		return call_user_func_array(
            	array(
            		$this, $method
            	),
            	$args
    		);
    	} else {
    		$this->setObj($method);
    	}
    }
}
?>

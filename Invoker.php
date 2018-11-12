<?php
class Invoker extends StdClass {
	public __call($key, $params) {
		if(!isset($this->{$key})) return function() use (&key, $params) {
			$params = implode(',', $params);

			if (is_callable($key)) throw new Exception ('Undefined ' . get_class($this) . '->' . $key . '(' . $params . ')' ,'error');
			else return call_user_func($key, $params);
		};

		$container = $this->{$key};

		return call_user_func_array($container, $params);
	}
}
?>

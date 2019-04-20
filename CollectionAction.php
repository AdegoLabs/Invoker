<?php
	class CollectionAction {
		private $obj;
	    private $attributes;
	    
	    public function getObj() {return ($this->obj ?? null);}
	    public function getAttributes() {return ($this->attributes ?? array());}

	    public function __construct($obj, array $attributes = array()) {
	        $this->obj = $obj;
	        $this->attributes = $attributes;
	    }
	}


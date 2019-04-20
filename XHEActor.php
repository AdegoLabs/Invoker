 <?php
 	 
 	 abstract class XHEActorAbstract {
 	 	protected $collectionAction;
 	 	protected function getCollection() {
 	 		return $this->collectionAction;
 	 	}
 	 	abstract public function init();
 	 	
 	 	abstract protected function action();
 	 }
 	 
 	 class XHEActor extends XHEActorAbstract {
 	 	public function __construct(CollectionAction $collectionAction) {
 	 		$this->collectionAction = $collectionAction;
 	 	}
 	 	
 	 	protected function action() {
 	 		return call_user_func_array(($this->collectionAction->getObj()), ($this->collectionAction->getAttributes()));
 	 	}
 	 	
 	 	public function init() {
 	 		$action = $this->action();
 	 		
 	 		return ($action ?? null);
 	 	}
 	 }	

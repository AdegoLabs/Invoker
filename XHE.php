<?php
namespace XHE;

class XHE {
	public $XHEExecutablePath;
	public $XHEBasePath;
	public $XHEPort;
	public $XHEScriptArgs;

	function __construct($basePath, $executablePath, $port, $scriptArgs) {
		$this->setXHEBasePath($basePath);
		$this->setXHEExecutablePath($executablePath);
		$this->setXHEPort($port);
		$this->setXHEScriptArgs($scriptArgs);
	}

	public function setXHEExecutablePath($executablePath) {
		$this->XHEExecutablePath = $executablePath;
	}

	public function setXHEBasePath($basePath) {
		$this->XHEBasePath = $basePath;
	}

	public function setXHEPort($port) {
		$this->XHEPort = $port;
	}

	public function setXHEScriptArgs($scriptArgs) {
		$this->XHEScriptArgs = $scriptArgs;
	}

	public function includeXHETemplates() {
		include_once($this->XHEBasePath . '\Templates\xweb_human_emulator.php');
	}

	public function runXHE() {
		$path = $this->XHEBasePath . '\\' . $this->XHEExecutablePath ;
		
		exec( 'start "XHE" "' . $path . '" /port:"' . $this->XHEPort . '"');		
	}

	

}


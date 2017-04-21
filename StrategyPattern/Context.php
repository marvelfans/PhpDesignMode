<?php

require_once('Strategy.php');

class Context {
	private $_IStrategy;
	public function __construct($IStrategy) {
		$this->_IStrategy = $IStrategy;
	}
	public function operate() {
		$this->_IStrategy->operate();
	}
}

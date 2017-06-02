<?php

require_once('LetterProcessImp1.php');

class ModernPostOffice {
	private $_letterProcessImp1 = NULL;

	public function __construct() {
		$this->_letterProcessImp1 = new LetterProcessImp1();
	}
		
	public function sendLetterImp1($content, $address) {
		$this->_letterProcessImp1->writeContent($content);
		$this->_letterProcessImp1->fillEnvelope($address);
		$this->_letterProcessImp1->letterIntoEnvelope();
		$this->_letterProcessImp1->sendLetter();
	}
}

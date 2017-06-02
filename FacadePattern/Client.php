<?php

require_once('ModernPostOffice.php');

class Client {
	private $_modernPostOffice = NULL;

	public function __construct() {
		$this->_modernPostOffice = new ModernPostOffice();
	}

	public function run() {
		$content = "致青春的一封信!";
		$address = "通往春天的火车!";

		$this->_modernPostOffice->sendLetterImp1($content, $address);
	}
}


$client = new Client();
$client->run();

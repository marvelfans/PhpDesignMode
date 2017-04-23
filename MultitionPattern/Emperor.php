<?php

class Emperor {
	private static $_Emperor = NULL;
	private static $_num = 2;
	private static $_listEmperor = NULL;
	private static $_listEmperorInfo = NULL;

	private function __construct() {

	}

	public static function getInstance() {
		if( self::$_listEmperor === NULL ) {
			self::$_listEmperor = array(new self(), new self());
			self::$_listEmperorInfo = array("This is one!", "This is two!");
		}
		$rand = rand(1, 2);	
		return self::$_listEmperor[$rand];
	}

	public function getEmperInfo() {
		print "I don't know which Emperor is?";
		print "\n";
	}
}

// main
$emperor = Emperor::getInstance();
$emperor->getEmperInfo();

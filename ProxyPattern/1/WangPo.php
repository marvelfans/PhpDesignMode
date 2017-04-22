<?php

require_once('PanJinLian.php');
require_once('JiaShi.php');

class WangPo {
	private $_kindWoman;
	public function __construct($kindWoman) {
		$this->_kindWoman = $kindWoman;
	}
	public function happyWithMan() {
		$this->_kindWoman->happyWithMan();
	}
	public function makeEyesWithMan() {
		$this->_kindWoman->makeEyesWithMan();
	}
}

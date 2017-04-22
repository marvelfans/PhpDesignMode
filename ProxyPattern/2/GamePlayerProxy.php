<?php

require_once('IGamePlayer.php');
require_once('GamePlayer.php');

class GamePlayerProxy implements IGamePlayer {
	private $_gamePlayer = NULL;
	public function __construct($name) {
		$this->_gamePlayer = new GamePlayer($this, $name);
	}

	public function login($name, $password) {
		$this->_gamePlayer->login($name, $password);
	}

	public function killBoss() {
		$this->_gamePlayer->killBoss();
	}

	public function upgrade() {
		$this->_gamePlayer->upgrade();
	}
}

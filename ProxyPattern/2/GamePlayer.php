<?php

require_once('IGamePlayer.php');

class GamePlayer implements IGamePlayer {
	private $_name = "";

	// 必须是代理才可以登录
	public function __construct($IGamePlayer = NULL, $name = NULL) {
		if( !isset($IGamePlayer) || !isset($name)) {
			die("不能创建真实角色\n");
		} else {
			$this->_name = $name;
		}
	}

	public function login($user, $password) {
		echo "登录名为: $user  的用户 " . $this->_name . " 登录成功!\n";
	}

	public function killBoss() {
		echo $this->_name . " 杀死了Boss\n";
	}

	public function upgrade() {
		echo $this->_name . " 升了一级\n";
	}
}

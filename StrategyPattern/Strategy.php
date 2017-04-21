<?php

require_once('IStrategy.php');

class BackDoor implements IStrategy {
	public function operate() {
		echo "找乔国老帮忙，让吴国太给孙权施加压力\n";
	}
}


class GivenGreenLight implements IStrategy {
	public function operate() {
		echo "求吴国太开个绿灯放心!\n";
	}
}

class BlockEnemy implements IStrategy {
	public function operate() {
		echo "孙夫人断后，挡住追兵\n";
	}
}

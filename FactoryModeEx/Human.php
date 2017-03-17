<?php

interface Human {
	public function getColor();	# 获取人的肤色	
	public function talk();		# 人都会说话
}

class BlackHuman implements Human {
	public function getColor() {
		echo "Black Human is Black!\n";
	}
	public function talk() {
		echo "Black Human can talk!\n";
	}
}

class WhiteHuman implements Human {
	public function getColor() {
		echo "White Human is Black!\n";
	}
	public function talk() {
		echo "White Human can talk!\n";
	}
}

class YellowHuman implements Human {
	public function getColor() {
		echo "Yellow Human is Black!\n";
	}
	public function talk() {
		echo "Yellow Human can talk!\n";
	}
}


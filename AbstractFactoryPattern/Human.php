<?php

interface IHuman {
	public function laugh();
	public function cry();
	public function talk();
	public function sex();
}

abstract class ABlackHuman implements IHuman {
	public function laugh() {
		echo "黑种人会笑\n";
	}
	public function cry() {
		echo "黑种人会哭\n";
	}
	public function talk() {
		echo "黑种人会交谈\n";
	}
}

abstract class AWhiteHuman implements IHuman {
	public function laugh() {
		echo "白种人会笑\n";
	}
	public function cry() {
		echo "白种人会哭\n";
	}
	public function talk() {
		echo "白种人会交谈\n";
	}
}

abstract class AYellowHuman implements IHuman {
	public function laugh() {
		echo "黄种人会笑\n";
	}
	public function cry() {
		echo "黄种人会哭\n";
	}
	public function talk() {
		echo "黄种人会交谈\n";
	}
}

class BlackMaleHuman extends ABlackHuman {
	public function sex() {
		echo "该黑人性别是男性\n";
	}
}

class WhiteMaleHuman extends AWhiteHuman {
	public function sex() {
		echo "该白人性别是男性\n";
	}
}

class YellowMaleHuman extends AYellowHuman {
	public function sex() {
		echo "该黄人性别是男性\n";
	}
}

class BlackFemaleHuman extends ABlackHuman {
	public function sex() {
		echo "该黑人性别是女性\n";
	}
}

class WhiteFemaleHuman extends AWhiteHuman {
	public function sex() {
		echo "该白人性别是女性\n";
	}
}

class YellowFemaleHuman extends AYellowHuman {
	public function sex() {
		echo "该黄人性别是女性\n";
	}
}

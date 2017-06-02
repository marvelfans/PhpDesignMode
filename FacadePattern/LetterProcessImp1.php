<?php
require_once('LetterProcess.php');

class LetterProcessImp1 implements LetterProcess {
	public function writeContent($content) {
		print "内容: " . $content . "\n";
	}
	public function fillEnvelope($address) {
		print "地址: " . $address . "\n";
	}
	public function letterIntoEnvelope() {
		print "装进信封\n";
	}
	public function sendLetter() {
		print "正在发送\n";
	}
}

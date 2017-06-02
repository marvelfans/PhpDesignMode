<?php

interface LetterProcess {
	public function writeContent($content);
	public function fillEnvelope($address);
	public function letterIntoEnvelope();
	public function sendLetter();
}

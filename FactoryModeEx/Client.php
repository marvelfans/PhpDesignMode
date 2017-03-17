<?php

# 测试工厂

include_once ('Factory.php');
include_once ('Human.php');

$YinYangLu = new HumanFactory();
$whitehuman = $YinYangLu->createHuman("WhiteHuman");
$whitehuman->getColor();
$whitehuman->talk();

$blackhuman = $YinYangLu->createHuman("BlackHuman");
$blackhuman->getColor();
$blackhuman->talk();

$yellowhuman = $YinYangLu->createHuman("YellowHuman");
$yellowhuman->getColor();
$yellowhuman->talk();


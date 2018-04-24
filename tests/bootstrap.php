<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 24.4.2018
 */
declare(strict_types=1);

use Tester\Environment;

if (@!include __DIR__ . '/../vendor/autoload.php') {
	echo 'Install Nette Tester using `composer update --dev`';
	exit(1);
}

$config = parse_ini_file(__DIR__ . '//php.ini');
$apiKey = $config['YT_TOKEN'];

Environment::setup();
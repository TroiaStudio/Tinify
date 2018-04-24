<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 24.4.2018
 */
declare(strict_types=1);

if (@!include __DIR__ . '/../vendor/autoload.php') {
	echo 'Install Nette Tester using `composer update --dev`';
	exit(1);
}

$config = parse_ini_file(__DIR__ . '/php.ini');
$apiKey = $config['TINIFY_TOKEN'];
putenv("TINIFY_TOKEN=$apiKey");


define('SOURCE_PATH', __DIR__ . '/sources');
define('TEMP_PATH', __DIR__ . '/temp');

//Environment::setup();
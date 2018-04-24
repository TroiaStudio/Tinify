<?php

use Tester\Assert;
use TroiaStudio\Tinify\Tinify;


require_once __DIR__ . '/../bootstrap.php';

/**
 * @author Jan Galek <jan.galek@troia-studio.cz>
 */
class TinifyTest extends \Tester\TestCase
{
	public function test1()
	{
		$tinify = new Tinify(getenv('TINIFY_TOKEN'));
		$file_original = SOURCE_PATH . '/original.jpeg';

		$tinify->optimize($file_original)->toFile(TEMP_PATH . '/optimized.jpeg');

		Assert::equal(true, file_exists(TEMP_PATH . '/optimized.jpeg'));
	}


	public function testBMP()
	{
		$tinify = new Tinify(getenv('TINIFY_TOKEN'));
		Assert::exception(function () use ($tinify) {
			$file_original = SOURCE_PATH . '/youtube.bmp';
			$tinify->optimize($file_original)->toFile(TEMP_PATH . '/youtube_optimized.bmp');
		}, \TroiaStudio\Tinify\Model\Exceptions\FileException::class, 'Bad request : Unexpected token B in JSON at position 0');

	}


	public function testGIF()
	{
		Assert::exception(function () {
			$tinify = new Tinify(getenv('TINIFY_TOKEN'));
			$file_original = SOURCE_PATH . '/youtube.gif';
			$tinify->optimize($file_original)->toFile(TEMP_PATH . '/youtube_optimized.gif');
		}, \TroiaStudio\Tinify\Model\Exceptions\FileException::class, 'Unsupported media type : File type is not supported');
	}
}

(new TinifyTest())->run();
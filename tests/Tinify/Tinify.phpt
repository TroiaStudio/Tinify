<?php
/**
 * Test: Kdyby\\Tinify.
 *
 * @testCase Kdyby\\TinifyTest
 * @author Filip Procházka <filip@prochazka.su>
 * @package Kdyby\
 */

namespace KdybyTests\;

use Nette;
use Tester;
use Tester\Assert;
use TroiaStudio\Tinify\Tinify;


require_once __DIR__ . '/../bootstrap.php';

/**
 * @author Jan Galek <jan.galek@troia-studio.cz>
 */
class TinifyTest extends Tester\TestCase
{
	public function setUp()
	{
	}


	public function test()
	{
		$tinify = new Tinify();
	}
}

\run(new TinifyTest());
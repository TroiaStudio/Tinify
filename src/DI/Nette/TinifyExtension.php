<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\DI\Nette;


use Nette\DI\Extensions\ExtensionsExtension;
use TroiaStudio\Tinify\Tinify;


class TinifyExtension extends ExtensionsExtension
{
	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig([
			'apiKey' => null
		]);

		$builder->addDefinition($this->prefix('tinify'))
			->setFactory(Tinify::class, [
				'key' => $config['apiKey'],
			]);
	}
}

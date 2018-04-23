<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify;

use TroiaStudio\Tinify\Client\Client;
use TroiaStudio\Tinify\Model\Exceptions\ClientException;
use TroiaStudio\Tinify\Model\Source;
use TroiaStudio\Tinify\Validators\FileExistsValidator;


class Tinify
{
	/**
	 * @var string
	 */
	private $key;

	/**
	 * @var Client
	 */
	private $client;


	public function __construct(string $key)
	{
		$this->key = $key;
	}


	/**
	 * @return Client
	 * @throws \Exception
	 */
	private function getClient(): Client
	{
		if (!$this->key) {
			throw new ClientException('Missing API key, use setKey()');
		}

		if (!$this->client) {
			$this->client = new Client($this->key);
		}

		return $this->client;
	}


	public function setClient(Client $client): self
	{
		$this->client = $client;
		return $this;
	}


	/**
	 * @param string $key
	 * @return $this
	 */
	public function setKey(string $key): self
	{
		$this->key = $key;
		return $this;
	}


	public function optimize(string $sourceFile): Source
	{
		FileExistsValidator::validate($sourceFile);
		$source = new Source($this->getClient(), $sourceFile);
		return $source->upload();
	}
}

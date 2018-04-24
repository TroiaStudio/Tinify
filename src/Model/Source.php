<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Model;

use GuzzleHttp\Exception\ClientException;
use TroiaStudio\Tinify\Client\Client;
use TroiaStudio\Tinify\Model\Exceptions\FileException;
use TroiaStudio\Tinify\Validators\Resize\SizeValidator;


class Source
{
	/**
	 * @var string
	 */
	private $sourceFile;

	/**
	 * @var Client
	 */
	private $client;

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @var string|null
	 */
	private $body;


	public function __construct(Client $client, string $sourceFile)
	{
		$this->client = $client;
		$this->sourceFile = $sourceFile;
	}


	public function toFile(string $saveFile = null): Source
	{
		$response = $this->client->request($this->url, $this->body);
		file_put_contents($saveFile, $response->getBody());
		return $this;
	}


	public function thumb(int $width, int $height): Source
	{
		return $this->resize(Resize::METHOD_THUMB, $width, $height);
	}


	public function cover(int $width, int $height): Source
	{
		return $this->resize(Resize::METHOD_COVER, $width, $height);
	}


	public function scaleHeight(int $height): Source
	{
		return $this->scale(null, $height);
	}


	public function scaleWidth(int $width): Source
	{
		return $this->scale($width);
	}


	public function scale(int $width = null, int $height = null): Source
	{
		return $this->resize(Resize::METHOD_SCALE, $width, $height);
	}


	public function fit(int $width, int $height): Source
	{
		return $this->resize(Resize::METHOD_FIT, $width, $height);
	}


	public function resize(string $method = Resize::METHOD_FIT, int $width = null, int $height = null): Source
	{
		SizeValidator::validate($method, $width, $height);
		$source = clone $this;
		$source->body = json_encode([
			'resize' => [
				'method' => $method,
				'width' => $width,
				'height' => $height
			]
		]);
		return $source;
	}


	/**
	 * @return $this
	 * @throws FileException
	 */
	public function upload()
	{
		try {
			$response = $this->client->request('/shrink', file_get_contents($this->sourceFile));
			$this->url = $response->getHeader('Location')[0];

		} catch (ClientException $e) {
			bdump($e);
			$error = json_decode((string) $e->getResponse()->getBody());
			throw new FileException(sprintf('%s : %s', $error->error, $error->message));
		}

		return $this;
	}


}

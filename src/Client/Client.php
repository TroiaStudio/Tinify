<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Client;

use GuzzleHttp;


class Client implements IClient
{
	public const API_ENDPOINT = 'https://api.tinify.com';
	public const VERSION = '1.5.2';

	/**
	 * @var string
	 */
	private $key;


	public function __construct(string $key)
	{
		$this->key = $key;
	}


	public function request(string $url = '/shrink', string $body = null): GuzzleHttp\Psr7\Response
	{
		$client = new GuzzleHttp\Client([
			'base_uri' => self::API_ENDPOINT,
			'headers' => [
				'Authorization' => 'Basic ' . base64_encode('api:' . $this->key),
				'Content-Type' => 'application/json'
			],
			'body' => $body
		]);

		return $client->request('post', $url);
	}
}

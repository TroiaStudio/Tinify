<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Model;


class Resize
{
	public const METHOD_FIT = 'fit',
				 METHOD_SCALE = 'scale',
				 METHOD_COVER = 'cover',
				 METHOD_THUMB = 'thumb';

	public $list = [
		self::METHOD_FIT,
		self::METHOD_SCALE,
		self::METHOD_COVER,
		self::METHOD_THUMB,
	];
}

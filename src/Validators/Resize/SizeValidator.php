<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Validators\Resize;


use TroiaStudio\Tinify\Model\Resize;
use TroiaStudio\Tinify\Model\Exceptions\ResizeMethodException;
use TroiaStudio\Tinify\Validators\IValidator;


class SizeValidator implements IValidator
{
	private const SIZE_VALIDATORS = [
		Resize::METHOD_FIT => FitValidator::class,
		Resize::METHOD_SCALE => ScaleValidator::class,
		Resize::METHOD_COVER => CoverValidator::class,
		Resize::METHOD_THUMB => ThumbValidator::class,
	];


	/**
	 * @param string|null $method
	 * @param int|null    $width
	 * @param int|null    $height
	 * @return bool
	 * @throws ResizeMethodException|\Exception
	 */
	public static function validate(string $method = null, int $width = null, int $height = null): bool
	{
		if (MethodValidator::validate($method)) {
			/** @var ISizeValidator $validator */
			$validator = self::SIZE_VALIDATORS[$method];
			$validator::validate($width, $height);
		}

		return false;
	}
}

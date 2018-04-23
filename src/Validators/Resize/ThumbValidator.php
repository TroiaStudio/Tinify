<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Validators\Resize;


use TroiaStudio\Tinify\Model\Exceptions\ResizeMethodException;


class ThumbValidator implements ISizeValidator
{

	/**
	 * @param int|null $width
	 * @param int|null $height
	 * @return bool
	 * @throws ResizeMethodException|\Exception
	 */
	public static function validate(int $width = null, int $height = null): bool
	{
		if ($width !== null && $height !== null) {
			return true;
		}

		throw new ResizeMethodException('Thumb: You must provide both a width and a height.');
	}
}

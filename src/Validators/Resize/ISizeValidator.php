<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Validators\Resize;

use TroiaStudio\Tinify\Model\Exceptions\ResizeMethodException;


interface ISizeValidator
{
	/**
	 * @param int $width
	 * @param int $height
	 * @throws ResizeMethodException
	 * @return bool
	 */
	public static function validate(int $width, int $height): bool;
}

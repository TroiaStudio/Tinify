<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Validators\Resize;


use TroiaStudio\Tinify\Model\Exceptions\ResizeMethodException;
use TroiaStudio\Tinify\Model\Resize;
use TroiaStudio\Tinify\Validators\IValidator;


class MethodValidator implements IValidator
{

	/**
	 * @param string $method
	 * @return bool
	 * @throws ResizeMethodException|\Exception
	 */
	public static function validate(string $method = ''): bool
	{
		$allowed = Resize::$list;
		if (\in_array($method, $allowed, false)) {
			return true;
		}

		throw new ResizeMethodException('Method: invalid type of method for resize. Allowed (' . implode(', ', $allowed) . ').');
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Validators;


use TroiaStudio\Tinify\Model\ResizeMethodException;


interface IValidator
{
	/**
	 * @throws ResizeMethodException
	 * @return bool
	 */
	public static function validate(): bool;
}

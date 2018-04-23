<?php
/**
 * Created by PhpStorm.
 * User: Galek
 * Date: 23.4.2018
 */
declare(strict_types=1);

namespace TroiaStudio\Tinify\Validators;


use TroiaStudio\Tinify\Model\Exceptions\FileException;


class FileExistsValidator implements IValidator
{

	/**
	 * @param string|null $file
	 * @return bool
	 * @throws FileException|\Exception
	 */
	public static function validate(string $file = null): bool
	{
		if ($file !== null && file_exists($file)) {
			return true;
		}

		throw new FileException(sprintf('File "%s" not exists.', $file));
	}
}

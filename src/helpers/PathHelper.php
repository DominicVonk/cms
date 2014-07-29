<?php
namespace Craft;

/**
 * Class PathHelper
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.helpers
 * @since     1.0
 */
class PathHelper
{
	/**
	 * Ensures that a relative path never goes deeper than its root directory.
	 *
	 * @param string $path
	 * @return bool
	 */
	public static function ensurePathIsContained($path)
	{
		// Sanitize
		$path = craft()->request->decodePathInfo($path);

		$segs = explode('/', $path);
		$level = 0;

		foreach ($segs as $seg)
		{
			if ($seg === '..')
			{
				$level--;
			}
			elseif ($seg !== '.')
			{
				$level++;
			}

			if ($level < 0)
			{
				return false;
			}
		}

		return true;
	}
}

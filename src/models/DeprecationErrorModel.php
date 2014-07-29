<?php
namespace Craft;

/**
 * Deprecation log model.
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.models
 * @since     1.0
 */
class DeprecationErrorModel extends BaseModel
{
	/**
	 * @return array
	 */
	protected function defineAttributes()
	{
		return array(
			'id'             => AttributeType::Number,
			'key'            => AttributeType::String,
			'fingerprint'    => AttributeType::String,
			'lastOccurrence' => AttributeType::DateTime,
			'file'           => AttributeType::String,
			'line'           => AttributeType::Number,
			'class'          => AttributeType::String,
			'method'         => AttributeType::String,
			'template'       => AttributeType::String,
			'templateLine'   => AttributeType::Number,
			'message'        => AttributeType::String,
			'traces'         => AttributeType::Mixed,
		);
	}

	/**
	 * Returns a simple indication of the origin of the deprecation error.
	 *
	 * @return string
	 */
	public function getOrigin()
	{
		if ($this->template)
		{
			$file = $this->template;

			if (strncmp($file, 'string:', 7) === 0)
			{
				$file = substr($file, 7);
				$line = null;
			}
			else
			{
				$line = $this->templateLine;
			}
		}
		else
		{
			$file = $this->file;
			$line = $this->line;
		}

		return $file.($line ? " ({$line})" : '');
	}
}

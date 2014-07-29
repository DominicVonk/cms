<?php
namespace Craft;

/**
 * Class OptionData
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.etc.fieldtypes
 * @since     1.0
 */
class OptionData
{
	public $label;
	public $value;
	public $selected;

	/**
	 * Constructor
	 *
	 * @param string $label
	 * @param string $value
	 * @param        $selected
	 */
	function __construct($label, $value, $selected)
	{
		$this->label    = $label;
		$this->value    = $value;
		$this->selected = $selected;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->value;
	}
}

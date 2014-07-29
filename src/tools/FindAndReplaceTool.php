<?php
namespace Craft;

/**
 * Find and Replace tool
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.tools
 * @since     1.0
 */
class FindAndReplaceTool extends BaseTool
{
	/**
	 * Returns the tool name.
	 *
	 * @return string
	 */
	public function getName()
	{
		return Craft::t('Find and Replace');
	}

	/**
	 * Returns the tool's icon value.
	 *
	 * @return string
	 */
	public function getIconValue()
	{
		return 'wand';
	}

	/**
	 * Returns the tool's options HTML.
	 *
	 * @return string
	 */
	public function getOptionsHtml()
	{
		return craft()->templates->renderMacro('_includes/forms', 'textField', array(
			array(
				'name'        => 'find',
				'placeholder' => Craft::t('Find'),
			)
		)) .
		craft()->templates->renderMacro('_includes/forms', 'textField', array(
			array(
				'name'        => 'replace',
				'placeholder' => Craft::t('Replace'),
			)
		));
	}

	/**
	 * Performs the tool's action.
	 *
	 * @param array $params
	 * @return array
	 */
	public function performAction($params = array())
	{
		if (!empty($params['find']) && !empty($params['replace']))
		{
			craft()->tasks->createTask('FindAndReplace', null, array(
				'find'    => $params['find'],
				'replace' => $params['replace']
			));
		}
	}
}

<?php
namespace Craft;

/**
 * Class CategoryGroupLocaleRecord
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.records
 * @since     1.0
 */
class CategoryGroupLocaleRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'categorygroups_i18n';
	}

	/**
	 * @return array
	 */
	protected function defineAttributes()
	{
		return array(
			'locale'          => array(AttributeType::Locale, 'required' => true),
			'urlFormat'       => AttributeType::UrlFormat,
			'nestedUrlFormat' => AttributeType::UrlFormat,
		);
	}

	/**
	 * @return array
	 */
	public function defineRelations()
	{
		return array(
			'group'  => array(static::BELONGS_TO, 'CategoryGroupRecord', 'required' => true, 'onDelete' => static::CASCADE),
			'locale' => array(static::BELONGS_TO, 'LocaleRecord', 'locale', 'required' => true, 'onDelete' => static::CASCADE, 'onUpdate' => static::CASCADE),
		);
	}

	/**
	 * @return array
	 */
	public function defineIndexes()
	{
		return array(
			array('columns' => array('groupId', 'locale'), 'unique' => true),
		);
	}
}

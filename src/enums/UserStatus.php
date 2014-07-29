<?php
namespace Craft;

/**
 * Class UserStatus
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.enums
 * @since     1.0
 */
abstract class UserStatus extends BaseEnum
{
	const Active    = 'active';
	const Locked    = 'locked';
	const Suspended = 'suspended';
	const Pending   = 'pending';
	const Archived  = 'archived';
}

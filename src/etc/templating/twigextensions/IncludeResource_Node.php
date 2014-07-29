<?php
namespace Craft;

/**
 * Class IncludeResource_Node
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.etc.templating.twigextensions
 * @since     1.0
 */
class IncludeResource_Node extends \Twig_Node
{
	/**
	 * Compiles an IncludeResource_Node into PHP.
	 */
	public function compile(\Twig_Compiler $compiler)
	{
		$function = $this->getAttribute('function');
		$path = $this->getNode('path');

		$compiler
			->addDebugInfo($this)
			->write('\Craft\craft()->templates->'.$function.'(')
			->subcompile($path);

		if ($this->getAttribute('first'))
		{
			$compiler->raw(', true');
		}

		$compiler->raw(");\n");
	}
}

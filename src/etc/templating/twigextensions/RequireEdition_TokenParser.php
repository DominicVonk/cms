<?php
namespace Craft;

/**
 * Class RequireEdition_TokenParser
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @link      http://buildwithcraft.com
 * @package   craft.app.etc.templating.twigextensions
 * @since     1.0
 */
class RequireEdition_TokenParser extends \Twig_TokenParser
{
	/**
	 * Parses {% requireEdition %} tags.
	 *
	 * @param \Twig_Token $token
	 * @return RequireEdition_Node
	 */
	public function parse(\Twig_Token $token)
	{
		$lineno = $token->getLine();
		$editionName = $this->parser->getExpressionParser()->parseExpression();
		$this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

		return new RequireEdition_Node(array('editionName' => $editionName), array(), $lineno, $this->getTag());
	}

	/**
	 * Defines the tag name.
	 *
	 * @return string
	 */
	public function getTag()
	{
		return 'requireEdition';
	}
}

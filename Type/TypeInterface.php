<?php
namespace CCDN\GuiBundle\Type;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
interface TypeInterface
{
    /**
     * @return string
     */
    public static function getType();

    /**
     * @param string $type
     * @return bool
     */
    public static function isType($type);
}

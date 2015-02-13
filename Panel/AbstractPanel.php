<?php
namespace CCDN\GuiBundle\Panel;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
abstract class AbstractPanel
{
    /**
     * @return string
     */
    public function getName()
    {
        return static::class;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function is($name)
    {
        return strtolower($name) == strtolower($this->getName());
    }
}

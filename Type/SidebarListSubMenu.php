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
class SidebarListSubMenu extends SidebarList implements TypeInterface
{
    protected static $type = 'sidebar_list_sub_menu';

    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return static
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}

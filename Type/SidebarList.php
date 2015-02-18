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
class SidebarList extends AbstractListType implements TypeInterface
{
    protected static $type = 'sidebar_list';

    /**
     * @param string $label
     * @param string[] $cssClasses
     * @return SidebarListHeading
     */
    public function addHeading($label, array $cssClasses = [])
    {
        $heading = $this->factory
            ->create(SidebarListHeading::getType())
            ->setLabel($label)
            ->setCssClasses($cssClasses)
        ;

        $this->add($heading);

        return $heading;
    }
}

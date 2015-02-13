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
class SidebarList extends AbstractType implements TypeInterface
{
    protected static $type = 'sidebar_list';

    /**
     * @var TypeInterface[]
     */
    protected $items;

    /**
     * @param TypeInterface $type
     * @return TypeInterface
     */
    public function add(TypeInterface $type)
    {
        $this->items[] = $type;

        return $type;
    }

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

    /**
     * @param string $label
     * @param string|null $url
     * @param string|null $route
     * @param string[] $routeParams
     * @param string[] $cssClasses
     * @return SidebarListHeading
     */
    public function addLink($label, $url = null, $route = null, array $routeParams = [], array $cssClasses = [])
    {
        $link = $this->factory
            ->create(Link::getType())
            ->setLabel($label)
            ->setUrl($url)
            ->setRoute($route)
            ->setRouteParams($routeParams)
            ->setCssClasses($cssClasses)
        ;

        $this->add($link);

        return $link;
    }

    /**
     * @param string $label
     * @param string[] $cssClasses
     * @return SidebarListSubMenu
     */
    public function addSubMenu($label, array $cssClasses = [])
    {
        $subMenu = $this->factory
            ->create(SidebarListSubMenu::getType())
            ->setLabel($label)
            ->setCssClasses($cssClasses)
        ;

        $this->add($subMenu);

        return $subMenu;
    }
}

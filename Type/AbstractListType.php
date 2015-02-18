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
abstract class AbstractListType extends AbstractType
{
    /**
     * @var TypeInterface[]
     */
    protected $children;

    /**
     * @return TypeInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param TypeInterface $type
     * @return TypeInterface
     */
    public function add(TypeInterface $type)
    {
        $this->children[] = $type;

        return $type;
    }

    /**
     * @param string $label
     * @param string|null $url
     * @param string|null $route
     * @param string[] $routeParams
     * @param string[] $cssClasses
     * @param bool $active
     * @param string $icon
     * @return SidebarListHeading
     */
    public function addLink($label, $url = null, $route = null, array $routeParams = [], array $cssClasses = [], $active = false, $icon = '')
    {
        $link = $this->factory
            ->create(Link::getType())
            ->setLabel($label)
            ->setUrl($url)
            ->setRoute($route)
            ->setRouteParams($routeParams)
            ->setCssClasses($cssClasses)
            ->setActive($active)
            ->setIcon($icon)
        ;

        $this->add($link);

        return $link;
    }

    /**
     * @param string $label
     * @param string[] $cssClasses
     * @param string $icon
     * @return SidebarListSubMenu
     */
    public function addSubMenu($label, array $cssClasses = [], $icon = '')
    {
        $subMenu = $this->factory
            ->create(SidebarListSubMenu::getType())
            ->setLabel($label)
            ->setCssClasses($cssClasses)
            ->setIcon($icon)
        ;

        $this->add($subMenu);

        return $subMenu;
    }
}

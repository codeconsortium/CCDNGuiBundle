<?php
namespace CCDN\GuiBundle\Factory;

use CCDN\GuiBundle\Chain\TypeFactoryChain;
use CCDN\GuiBundle\Type\SidebarList;
use CCDN\GuiBundle\Type\TypeInterface;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class GuiFactory
{
    /**
     * @var TypeFactoryChain
     */
    protected $typeFactoryChain;

    /**
     * @param TypeFactoryChain $typeFactoryChain
     */
    public function __construct(TypeFactoryChain $typeFactoryChain)
    {
        $this->typeFactoryChain = $typeFactoryChain;
    }

    /**
     * @param string $name
     * @return TypeInterface
     * @throws \Exception
     */
    public function create($name)
    {
        return $this->typeFactoryChain->create($this, $name);
    }

    /**
     * @param string[] $cssClasses
     * @return SidebarList
     */
    public function createSidebarList(array $cssClasses = [])
    {
        return $this
            ->create(SidebarList::getType())
            ->setCssClasses($cssClasses)
        ;
    }
}

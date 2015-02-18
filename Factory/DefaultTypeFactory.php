<?php
namespace CCDN\GuiBundle\Factory;

use CCDN\GuiBundle\Type\Link;
use CCDN\GuiBundle\Type\SidebarList;
use CCDN\GuiBundle\Type\SidebarListHeading;
use CCDN\GuiBundle\Type\SidebarListSubMenu;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class DefaultTypeFactory implements TypeFactoryInterface
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @var string[]
     */
    protected $type = [];

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;

        $types = [Link::class, SidebarList::class, SidebarListHeading::class, SidebarListSubMenu::class];
        foreach ($types as $type) {
            $this->type[strtolower($type::getType())] = $type;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hasType($name)
    {
        return array_key_exists(strtolower($name), $this->type);
    }

    /**
     * {@inheritdoc}
     */
    public function create(GuiFactory $factory, $name)
    {
        if (!$this->hasType($name)) {
            throw new \Exception('You have requested a non-existent GUI type');
        }

        return new $this->type[$name]($factory, $this->translator);
    }
}

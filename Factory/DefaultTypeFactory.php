<?php
namespace CCDN\GuiBundle\Factory;

use CCDN\GuiBundle\Type\Link;
use CCDN\GuiBundle\Type\SidebarList;
use CCDN\GuiBundle\Type\SidebarListHeading;
use CCDN\GuiBundle\Type\SidebarListSubMenu;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * @Service("ccdn_gui.default_type_factory")
 * @Tag("ccdn_gui.type_factory")
 *
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
     * @InjectParams({
     *      "translator" = @Inject("translator")
     * })
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;

        $types = [Link::class, SidebarList::class, SidebarListHeading::class, SidebarListSubMenu::class];
        foreach ($types as $type) {
            $this->type[strtolower($type::getType())] = $type::class;
        }

//        $this->type = [
//            Link::getType() => Link::class,
//            SidebarList::getType() => SidebarList::class,
//            SidebarListHeading::getType() => SidebarListHeading::class,
//            SidebarListSubMenu::getType() => SidebarListSubMenu::class,
//        ];
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

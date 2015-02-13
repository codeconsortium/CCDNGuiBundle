<?php
namespace CCDN\GuiBundle\Type;

use CCDN\GuiBundle\Factory\GuiFactory;
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
abstract class AbstractType
{
    /**
     * @var GuiFactory
     */
    protected $factory;

    /**
     * @var TranslatorInterface
     */
    protected $translator;
    /**
     * @var string[]
     */
    protected $cssClasses = [];

    /**
     * @param GuiFactory $factory
     * @param TranslatorInterface $translator
     */
    public function __construct(GuiFactory $factory, TranslatorInterface $translator)
    {
        $this->factory = $factory;
        $this->translator = $translator;
    }

    /**
     * @return string
     */
    public static function getType()
    {
        return static::$type;
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function isType($type)
    {
        return static::getType() === strtolower($type);
    }

    /**
     * @return string[]
     */
    public function getCssClasses()
    {
        return $this->cssClasses;
    }

    /**
     * @param string[] $cssClasses
     * @return static
     */
    public function setCssClasses(array $cssClasses = [])
    {
        $this->cssClasses = $cssClasses;

        return $this;
    }

    /**
     * @param string[] $cssClass
     * @return static
     */
    public function addCssClass($cssClass)
    {
        $this->cssClass[] = $cssClass;

        return $this;
    }
}

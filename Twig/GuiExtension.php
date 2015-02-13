<?php
namespace CCDN\GuiBundle\Twig;

use CCDN\GuiBundle\Chain\PanelChain;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use CCDN\GuiBundle\Renderer\TwigRenderer;

/**
 * @Service("gui_extension")
 * @Tag("twig.extension")
 *
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class GuiExtension extends \Twig_Extension
{
    /**
     * @var TwigRenderer
     */
    protected $renderer;

    /**
     * @var PanelChain
     */
    protected $panelChain;

    /**
     * @InjectParams({
     *     "twigRenderer" = @Inject("ccdn_gui_twig_renderer")
     * })
     *
     * @param TwigRenderer $twigRenderer
     * @param PanelChain $panelChain
     */
    public function __construct(TwigRenderer $twigRenderer, PanelChain $panelChain)
    {
        $this->renderer = $twigRenderer;
        $this->panelChain = $panelChain;

    }

    public function getFunctions()
    {
        return array(
            'ccdn_gui_render' => new \Twig_Function_Method($this, 'render'),
        );
    }

    /**
     * Renders a menu with the specified renderer.
     *
     * @param ItemInterface|string|array $menu
     * @param array                      $options
     * @param string                     $renderer
     *
     * @return string
     */
    public function render($menu, array $options = array(), $renderer = null)
    {
        $this->panelChain->hasPanel($menu);
        var_dump([
            $menu,
            $options,
            $renderer
        ]);die;
        //return $this->helper->render($menu, $options, $renderer);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ccdn_gui';
    }
}

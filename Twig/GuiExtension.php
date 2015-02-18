<?php
namespace CCDN\GuiBundle\Twig;

use CCDN\GuiBundle\Renderer\TwigRenderer;

/**
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
     * @param TwigRenderer $twigRenderer
     */
    public function __construct(TwigRenderer $twigRenderer)
    {
        $this->renderer = $twigRenderer;
    }

    public function getFunctions()
    {
        return array(
            'ccdn_gui_render' => new \Twig_Function_Method($this, 'render', ['is_safe' => ['html']]),
        );
    }

    /**
     * @param string $panelName
     * @param array $options
     * @param string $renderer
     *
     * @return string
     */
    public function render($panelName, array $options = [], $renderer = null)
    {
        return $this->renderer->render($panelName, $options);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ccdn_gui';
    }
}

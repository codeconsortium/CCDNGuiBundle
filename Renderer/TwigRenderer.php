<?php
namespace CCDN\GuiBundle\Renderer;

use CCDN\GuiBundle\Provider\PanelProvider;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class TwigRenderer
{
    /**
     * @var \Twig_Environment
     */
    private $environment;

    /**
     * @var PanelProvider
     */
    private $panelProvider;

    /**
     * @param \Twig_Environment $environment
     * @param PanelProvider $panelProvider
     */
    public function __construct(\Twig_Environment $environment, PanelProvider $panelProvider)
    {
        $this->environment = $environment;
        $this->panelProvider = $panelProvider;
    }

    /**
     * @param string $gui
     * @param array $options
     * @param null $rendererTemplate
     * @return string
     */
    public function render($gui, array $options = [], $rendererTemplate = null)
    {
        $nodes = $this->panelProvider->getPanel($gui);

        return $this->environment->render($options['template'], ['root' => $nodes, 'options' => $options]);
    }
}

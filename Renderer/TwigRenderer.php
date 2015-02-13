<?php
namespace CCDN\GuiBundle\Renderer;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;

//<tag name="knp_menu.renderer" alias="twig" />
//            <argument type="service" id="twig" />

/**
 * @Service("ccdn_gui_twig_renderer")
 *
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
    private $matcher;
    private $defaultOptions;

    /**
     * @InjectParams({
     *      "environment" = @Inject("twig")
     * })
     * @param \Twig_Environment $environment
     * @param string            $template
     * @param MatcherInterface  $matcher
     * @param array             $defaultOptions
     */
    public function __construct(\Twig_Environment $environment/*, $template, MatcherInterface $matcher, array $defaultOptions = array()*/)
    {
        $this->environment = $environment;
    }
}

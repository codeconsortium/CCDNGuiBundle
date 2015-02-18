<?php
namespace CCDN\GuiBundle\Provider;

use CCDN\GuiBundle\Panel\PanelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class PanelProvider
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var PanelInterface[]
     */
    protected $panel;

    /**
     * @param ContainerInterface $container
     * @param PanelInterface[] $panel
     */
    public function __construct(ContainerInterface $container, array $panel = [])
    {
        $this->container = $container;
        $this->panel = $panel;
    }

    /**
     * @param PanelInterface $panel
     * @param string $name
     */
    public function addPanel(PanelInterface $panel, $name)
    {
        $this->panel[strtolower($name)] = $panel;
    }

    /**
     * @param string $panelName
     * @return bool
     */
    public function hasPanel($panelName)
    {
        return array_key_exists(strtolower($panelName), $this->panel);
    }

    /**
     * @param string $panelName
     * @return PanelInterface
     * @throws \Exception
     */
    public function getPanel($panelName)
    {
        if (!$this->hasPanel($panelName)) {
            throw new \Exception('Requested Panel does not exist!');
        }

        return $this->container->get($this->panel[strtolower($panelName)]);
    }
}

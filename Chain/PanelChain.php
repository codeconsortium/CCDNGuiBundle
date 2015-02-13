<?php
namespace CCDN\GuiBundle\Chain;

use CCDN\GuiBundle\Panel\PanelInterface;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;

/**
 * @Service("ccdn_gui.panel_chain")
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
class PanelChain
{
    /**
     * @var PanelInterface[]
     */
    protected $panel;

    /**
     * @param PanelInterface[] $panel
     */
    public function __construct(array $panel = [])
    {
        $this->panel = $panel;
    }

    /**
     * @param PanelInterface $panel
     */
    public function addPanel(PanelInterface $panel)
    {
        $this->panel[strtolower($panel->getName())] = $panel;
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

        return $this->panel[strtolower($panelName)];
    }
}

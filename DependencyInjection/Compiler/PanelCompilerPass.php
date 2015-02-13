<?php
namespace CCDN\GuiBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class PanelCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('ccdn_gui.panel_chain')) {
            return;
        }

        $definition = $container->getDefinition('ccdn_gui.panel_chain');
        $taggedServices = $container->findTaggedServiceIds('ccdn_gui.panel');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('addPanel', array(new Reference($id)));
        }
    }
}

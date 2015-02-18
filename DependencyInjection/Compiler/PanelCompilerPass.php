<?php
namespace CCDN\GuiBundle\DependencyInjection\Compiler;

use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

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
     * @throws \InvalidArgumentException
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('ccdn_gui.panel_provider')) {
            return;
        }

        $definition = $container->getDefinition('ccdn_gui.panel_provider');
        $taggedServices = $container->findTaggedServiceIds('ccdn_gui.panel');
        $guiBuilders = [];
        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                if (empty($attributes['alias'])) {
                    throw new InvalidArgumentException(sprintf('The alias is not defined in the "ccdn_gui.panel" tag for the service "%s"', $id));
                }

                $guiBuilders[$attributes['alias']] = $id;
            }
        }

        $definition->replaceArgument(1, $guiBuilders);
    }
}

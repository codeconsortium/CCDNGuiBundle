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
class TypeFactoryCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('ccdn_gui.type_factory_chain')) {
            return;
        }

        $definition = $container->getDefinition('ccdn_gui.type_factory_chain');
        $taggedServices = $container->findTaggedServiceIds('ccdn_gui.type_factory');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('addTypeFactory', array(new Reference($id)));
        }
    }
}

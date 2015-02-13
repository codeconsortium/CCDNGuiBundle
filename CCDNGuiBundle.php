<?php
namespace CCDN\GuiBundle;

use CCDN\GuiBundle\DependencyInjection\Compiler\PanelCompilerPass;
use CCDN\GuiBundle\DependencyInjection\Compiler\TypeFactoryCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class CCDNGuiBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new PanelCompilerPass());
        $container->addCompilerPass(new TypeFactoryCompilerPass());
    }
}

<?php
namespace CCDN\GuiBundle\Chain;

use CCDN\GuiBundle\Factory\GuiFactory;
use CCDN\GuiBundle\Factory\TypeFactoryInterface;
use CCDN\GuiBundle\Type\TypeInterface;

/**
 *
 * @category CCDN
 * @package  GuiBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/codeconsortium/CCDNGuiBundle
 */
class TypeFactoryChain
{
    /**
     * @var TypeFactoryInterface[]
     */
    protected $typeFactory = [];

    /**
     * @param TypeFactoryInterface[] $typeFactories
     */
    public function __construct(array $typeFactories = [])
    {
        $this->typeFactory = $typeFactories;
    }

    /**
     * @param TypeFactoryInterface $typeFactory
     */
    public function addTypeFactory(TypeFactoryInterface $typeFactory)
    {
        $this->typeFactory[] = $typeFactory;
    }

    /**
     * @param string $name
     * @param GuiFactory $factory
     * @return TypeInterface
     * @throws \Exception
     */
    public function create(GuiFactory $factory, $name)
    {
        foreach ($this->typeFactory as $typeFactory) {
            if ($typeFactory->hasType($name)) {
                return $typeFactory->create($factory, $name);
            }
        }

        throw new \Exception('Requested GUI Component Type does not exist or is not registered and cannot be created');
    }
}

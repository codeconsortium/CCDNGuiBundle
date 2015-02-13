<?php
namespace CCDN\GuiBundle\Factory;

use CCDN\GuiBundle\Type\TypeInterface;

interface TypeFactoryInterface
{
    /**
     * @param string $name
     * @return bool
     */
    public function hasType($name);

    /**
     * @param string $name
     * @param GuiFactory $factory
     * @return TypeInterface
     */
    public function create(GuiFactory $factory, $name);
}

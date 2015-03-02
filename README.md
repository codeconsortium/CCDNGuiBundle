# CCDNGuiBundle
Twig Renderable Gui Builder using Class derived types

This project is an experimental work in progress

Usages:

        $productMeta = $this->factory->create(SidebarListSubMenu::getType())->setLabel('Product Meta')->setIcon('icon-folder'); // creates link before before new list?
        $productMeta->addLink('Categories', 'foo', null, []);
        $productMeta->add($this->factory->create(Link::getType())->setLabel('Attributes'));
        $productMeta->add($this->factory->create(Link::getType())->setLabel('Products'));
        $menu->add($productMeta);

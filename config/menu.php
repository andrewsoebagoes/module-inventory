<?php

return [
    [
        'label' => 'inventory.menu.inventory_units',
        'icon'  => 'fa-fw fa-xl me-2 fa-solid fa-list',
        'route' => routeTo('crud/index',['table'=>'inventory_units']),
        'activeState' => 'inventory.inventory_units'
    ],
    [
        'label' => 'inventory.menu.inventory_items',
        'icon'  => 'fa-fw fa-xl me-2 fa-solid fa-list',
        'route' => routeTo('crud/index',['table'=>'inventory_items']),
        'activeState' => 'inventory.inventory_items'
    ],
  

];
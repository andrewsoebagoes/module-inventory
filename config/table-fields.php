<?php 

return [

    'inventory_units'  => [
        'name' => [
            'label' => __('inventory.label.name'),
            'type'  => 'text'
        ]
    ],

    'inventory_items'  => [
        'name' => [
            'label' => __('inventory.label.name'),
            'type'  => 'text'
        ],
        'unit_id' => [
            'label' => __('inventory.label.unit'),
            'type'  => 'options-obj:inventory_units,id,name'
        ],
        'record_type' => [
            'label' => __('inventory.label.record_type'),
            'type'  => 'text'
        ],
       
    ],
    
    'inventory_item_logs'  => [
        'item_id' => [
            'label' => __('inventory.label.item'),
            'type'  => 'options-obj:inventory_items,id,name'
        ],
        'amount' => [
            'label' => __('inventory.label.amount'),
            'type'  => 'text'
        ],
        'organization_src_id' => [
            'label' => __('inventory.label.organization_src_id'),
            'type'  => 'options-obj:organizations,id,name'
        ],
        'organization_dst_id' => [
            'label' => __('inventory.label.organization_dst_id'),
            'type'  => 'options-obj:organizations,id,name'
        ],
       
    ],

];
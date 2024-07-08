<?php

use Core\Page;
use Core\Database;
use Core\Request;

$db = new Database;

if(Request::isMethod('POST'))
{
    $data = $_POST;
    foreach($data['items'] as $barcode => $value)
    {
        $item = $db->single('inventory_items', [
            'barcode' => $barcode
        ]);
        $db->insert('inventory_item_logs', [
            'organization_src_id' => $data['organization_src_id'],
            'organization_dst_id' => $data['organization_dst_id'],
            'amount' => $value,
            'item_id' => $item->id,
        ]);

        set_flash_msg(['success'=>"$title berhasil ditambahkan"]);

        header('location:'.crudRoute('crud/index', 'inventory_items'));
        die();
    }
}

$organizations = $db->all('organizations');

Page::setTitle('Stock Panel');
Page::setModuleName('Stock Panel');

Page::pushHead('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />');
Page::pushHead('<style>.select2,.select2-selection{height:38px!important;} .select2-container--default .select2-selection--single .select2-selection__rendered{line-height:38px!important;}.select2-selection__arrow{height:34px!important;}</style>');
Page::pushFoot('<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>');
Page::pushFoot('<script src="https://unpkg.com/html5-qrcode"></script>');
Page::pushFoot('<script src="'.asset('assets/inventory/stock-panel.js').'"></script>');

return view('inventory/views/stock-panel', compact('organizations'));
<?php

return '
        <a href="' . routeTo('crud/index', ['table' => 'inventory_item_logs', 'filter' => ['item_id' => $data->id]]) . '" class="btn btn-sm btn-info"><i class="fas fa-info"></i> ' . __('inventory.label.log') . '</a>
        <a href="' . routeTo('inventory/index-report_stock', ['filter' => ['item_id' => $data->id]]) . '" class="btn btn-sm btn-success"><i class="fas fa-file"></i> ' . __('inventory.label.stock_report') . '</a>
 ';

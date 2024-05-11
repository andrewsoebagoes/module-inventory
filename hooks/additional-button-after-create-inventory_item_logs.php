<?php

if(is_allowed('inventory/index-report_stock', auth()->id) && isset($_GET['filter']) && $_GET['filter']['item_id'])
{
    return '<a href="' . routeTo('inventory/index-report_stock', ['filter' => ['item_id' => $_GET['filter']['item_id'] ]]) . '" class="btn btn-sm btn-success"><i class="fas fa-file"></i> ' . __('inventory.label.stock_report') . '</a>';
}

return '';
<?php

if(is_allowed('inventory/stock-panel', auth()->id))
{
    return '<a href="' . routeTo('inventory/stock-panel') . '" class="btn btn-sm btn-success"><i class="fas fa-file"></i> ' . __('inventory.label.stock_panel') . '</a>';
}

return '';
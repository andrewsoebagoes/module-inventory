<?php

use Core\Page;
use Core\Database;
use Modules\Crud\Libraries\Repositories\CrudRepository;

// init table fields
$success_msg = get_flash_msg('success');
$error_msg   = get_flash_msg('error');
$item_id     = $_GET['filter']['item_id'];

$db = new Database;
$db->query = "SELECT 
    organizations.id,
    organizations.name,
    outlogs.total amount_out,
    inlogs.total amount_in,
    COALESCE(inlogs.total,0)-COALESCE(outlogs.total,0) AS total_stock
FROM 
    organizations 
LEFT JOIN (
    SELECT 
        SUM(amount) total, 
        organization_src_id organization_id,
        item_id
    FROM inventory_item_logs
    GROUP BY organization_src_id, item_id
) outlogs ON outlogs.organization_id = organizations.id AND outlogs.item_id = $item_id
LEFT JOIN (
    SELECT 
        SUM(amount) total, 
        organization_dst_id organization_id,
        item_id
    FROM inventory_item_logs
    GROUP BY organization_dst_id, item_id
) inlogs ON inlogs.organization_id = organizations.id AND inlogs.item_id = $item_id
WHERE 
    organizations.id IN (SELECT organization_src_id FROM inventory_item_logs GROUP BY organization_src_id) OR 
    organizations.id IN (SELECT organization_dst_id FROM inventory_item_logs GROUP BY organization_dst_id)
";

$data= $db->exec('all');

// page section
$title = __('inventory.label.stock_report');
Page::setTitle($title);
Page::setModuleName($title);


Page::pushFoot("<script src='".asset('assets/crud/js/crud.js')."'></script>");

return view('inventory/views/index-report_stock', compact('success_msg', 'error_msg', 'data'));
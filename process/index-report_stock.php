<?php

use Core\Page;
use Core\Database;
use Modules\Crud\Libraries\Repositories\CrudRepository;

// init table fields
$success_msg = get_flash_msg('success');
$error_msg   = get_flash_msg('error');
$item_id     = $_GET['filter']['item_id'];

$db = new Database;
$db->query = "SELECT inventory_item_logs.organization_dst_id, organizations.name, SUM(inventory_item_logs.amount) as total_stock
FROM inventory_item_logs 
LEFT JOIN organizations ON organizations.id = inventory_item_logs.organization_dst_id
WHERE inventory_item_logs.item_id = '$item_id'
GROUP BY inventory_item_logs.organization_dst_id, organizations.name
";

$data= $db->exec('all');

// page section
$title = __('inventory.label.stock_report');
Page::setTitle($title);
Page::setModuleName($title);


Page::pushFoot("<script src='".asset('assets/crud/js/crud.js')."'></script>");

return view('inventory/views/index-report_stock', compact('success_msg', 'error_msg', 'data'));
<?php

use Core\Database;
use Core\Response;

$db = new Database;
$item = $db->single('inventory_items', [
    'id' => $_GET['id']
]);

return view('inventory/views/barcode', compact('item'));
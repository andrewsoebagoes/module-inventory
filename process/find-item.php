<?php

use Core\Database;
use Core\Response;

$db = new Database;
$barcode = isset($_POST['barcode']) ? $_POST['barcode'] : '';
$item = $db->single('inventory_items', [
    'barcode' => $barcode
]);

return Response::json($item, 'data retrieved');
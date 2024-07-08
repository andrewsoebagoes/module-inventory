<?php

use Core\Database;
use Core\Response;

$db = new Database;
$q = isset($_GET['q']) ? $_GET['q'] : '';
$items = $db->all('inventory_items', [
    'name' => ['LIKE', '%'.$q.'%']
]);

return Response::json($items, 'data retrieved');
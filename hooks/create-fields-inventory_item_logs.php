<?php

if(isset($_GET['filter']) && isset($_GET['filter']['item_id']))
{
    unset($fields['item_id']);
}

return $fields;
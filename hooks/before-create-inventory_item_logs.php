<?php

if(isset($_GET['filter']) && isset($_GET['filter']['item_id']))
{
    $data['item_id'] = $_GET['filter']['item_id'];
}
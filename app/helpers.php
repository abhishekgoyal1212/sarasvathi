<?php

use Illuminate\Support\Facades\Auth;

function pre($data, $status = false)
{
    echo "<pre>";
    print_r($data);
    if (!$status) {
        die;
    }
}


function upperfirst($data, $status = false)
{
    if (!$status) {
        $result = ucfirst(strtolower($data));
    } else {
        $result = ucfirst($data);
    }
    return $result;
}




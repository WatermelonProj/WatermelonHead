<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: vaio
 * Date: 09/06/2017
 * Time: 10:49
 */

function toCarbon($data)
{
    $data = new Carbon($data);
    return $data;
}

function sumArrays($a1, $a2)
{

    $keys = array_fill_keys(array_keys($a1 + $a2), 0);

    $sums = array_map(function ($a1, $a2) {
        return $a1 + $a2;
    }, array_merge($keys, $a1), array_merge($keys, $a2));

    return $sums;
}
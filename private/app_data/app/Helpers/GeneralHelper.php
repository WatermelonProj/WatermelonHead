<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: vaio
 * Date: 09/06/2017
 * Time: 10:49
 */

function toCarbon($data) {
    $data = new Carbon($data);
    return $data;
}
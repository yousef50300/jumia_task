<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Generate unique code
 *
 * @param int $length
 * @param string $table
 * @param string $column
 *
 * @return string
 */
function generateRandomNumberCode($length, $table, $column)
{
    $code = Str::random($length);

    if (checkIfCodeExist($code, $table, $column)) {
        generateRandomNumberCode($length + 1, $table, $column);
    }

    return $code;
}

/**
 * Check if coupon code is exist
 *
 * @param string $code
 * @param string $table
 * @param string $column
 *
 * @return bool
 */
function checkIfCodeExist($code, $table, $column)
{
    return DB::table($table)->where($column, $code)->first() ? true : false;
}

function generateAllDestinations($start, $crossOver, $end)
{
    if (is_array($crossOver) and count($crossOver)) {
        $stops = $crossOver;
        array_unshift($stops, $start);
        array_push($stops, $end);
    } else {
        $stops = [$start, $end];
    }

    $stopCounts = count($stops);

    $stopsDestinations = [];

    for ($i = 0; $i < $stopCounts; $i++) {
        for ($j = $i + 1; $j < $stopCounts; $j++) {
            $stopsDestinations[] = [
                'from' => $stops[$i],
                'to' => $stops[$j],
            ];
        }
    }

    return $stopsDestinations;
}

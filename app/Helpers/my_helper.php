<?php

function kodeRapat()
{
    $length = 3; // Length of the random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $segment1 = substr(str_shuffle($characters), 0, $length);
    $segment2 = substr(str_shuffle($characters), 0, $length);
    $kode = $segment1 . '-' . $segment2;
    return $kode;
}

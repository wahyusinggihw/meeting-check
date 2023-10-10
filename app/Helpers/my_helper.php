<?php

use chillerlan\QRCode\{QRCode, QROptions};


function kodeRapat()
{
    $length = 3; // Length of the random string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $segment1 = substr(str_shuffle($characters), 0, $length);
    $segment2 = substr(str_shuffle($characters), 0, $length);
    $kode = $segment1 . '-' . $segment2;
    return $kode;
}

function expiredTime($startTime)
{
    // $startTime = $rapat['jam']; // Your initial time
    $interval = '1 hour'; // The interval you want to add

    // Convert the time to a Unix timestamp
    $timestamp = strtotime($startTime);

    // Add the interval (1 hour) to the timestamp
    $timestamp = strtotime('+' . $interval, $timestamp);

    // Format the new time as HH:MM
    $expiredTime = date('H:i', $timestamp);

    return $expiredTime;
}

function generateQrCode($linkRapat)
{
    $qr = new QRCode;
    $result = $qr->render($linkRapat);
    return $result;
}

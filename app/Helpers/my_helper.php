<?php

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\CURLRequest;
use chillerlan\QRCode\{QRCode, QROptions};


function kodeRapat()
{
    $length = 3; // Length of the random string
    $characters = '0123456789';
    $segment1 = substr(str_shuffle($characters), 0, $length);
    $segment2 = substr(str_shuffle($characters), 0, $length);
    $kode = $segment1 . '-' . $segment2;
    return $kode;
}

function expiredTime($date, $time)
{
    // // $startTime = $rapat['jam']; // Your initial time
    // $interval = '4 hour'; // The interval you want to add

    // // Convert the time to a Unix timestamp
    // $timestamp = strtotime($startTime);

    // // Add the interval (1 hour) to the timestamp
    // $timestamp = strtotime('+' . $interval, $timestamp);

    // // Format the new time as HH:MM
    // $expiredTime = date('H:i', $timestamp);

    // return $expiredTime;

    $datetimeStr = $date . ' ' . $time;
    $interval = '4 hours'; // The interval you want to add

    // Convert the datetime string to a DateTime object
    $datetime = new DateTime($datetimeStr);

    // Add the interval to the datetime
    $datetime->add(new DateInterval('PT4H'));

    // Format the new datetime as 'Y-m-d H:i'
    $expiredDateTime = $datetime->format('Y-m-d H:i');

    $currentDateTime = new DateTime();
    // dd($currentDateTime->format('Y-m-d H:i'), $expiredDateTime);
    if ($currentDateTime->format('Y-m-d H:i') > $expiredDateTime) {
        // Meeting has expired
        return true;
    } else {
        // Meeting is still valid
        return false;
    }

    // return $expiredDateTime;
}

function generateQrCode($linkRapat)
{
    // add logo to qr
    // qroptions for qr without padding
    $options = new QROptions(
        [
            'addLogoSpace'  => true,
            'logoPath'      => FCPATH . base_url('assets/img/logo.png'),
            'logoSpaceWidth' => 9,
            'logoSpaceHeight' => 9,
            'logoSpaceStartX' => 10,
            'logoSpaceStartY' => 10,

        ]
    );
    $options->addLogoSpace    = true;
    $qr = new QRCode($options);
    $result = $qr->render($linkRapat);
    return $result;
}

function loopIteration($pager, $group)
{
    $counter = $pager->getDetails($group)['currentPage'] === 1 ? 1 : ($pager->getDetails($group)['currentPage'] - 1) * 5 + 1;

    return $counter;
}

// captcha server side
function verifyCaptcha($token)
{
    $config = config('Recaptcha');

    $client = service('curlrequest');
    $secretKey = getenv('RECAPTCHA_SECRET_KEY');

    $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
        'form_params' => [
            'secret'   => $secretKey,
            'response' => $token,
        ],
    ]);

    if ($response->getStatusCode() === 200) {
        $result = json_decode($response->getBody());

        return $result;
    }
    return null;
}

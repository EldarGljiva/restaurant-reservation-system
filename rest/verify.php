<?php
require_once '../config.php';

function verifyHCaptcha($hCaptchaResponse)
{
    $data = [
        'secret' => 'ES_8f3f06d1189444cd97bddcb31f34349a',
        'response' => $hCaptchaResponse,
    ];

    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($verify);
    if ($response === false) {
        error_log('Curl error: ' . curl_error($verify));
        return false;
    } else {
        $responseData = json_decode($response);
        if ($responseData === null) {
            error_log('json_decode error: ' . json_last_error_msg());
            return false;
        } else if ($responseData->success) {
            return true;
        } else {
            return false;
        }
    }
}

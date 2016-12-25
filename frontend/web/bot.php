<?php

function callApi( $method, $params) {
    $url = sprintf(
        "https://api.telegram.org/bot%s/%s",
        '174618891:AAEZgV_EfjJUEnJvIWs0B-wmq535fXJuVB0',
        'sendMessage'
    );

    $ch = curl_init();
    curl_setopt_array( $ch, array(
        CURLOPT_URL             => $url,
        CURLOPT_POST                => TRUE,
        CURLOPT_RETURNTRANSFER  => TRUE,
        CURLOPT_FOLLOWLOCATION  => FALSE,
        CURLOPT_HEADER          => FALSE,
        CURLOPT_TIMEOUT         => 10,
        CURLOPT_HTTPHEADER      => array( 'Accept-Language: ru,en-us'),
        CURLOPT_POSTFIELDS      => $params,

    ));

    $response = curl_exec($ch);
    return json_decode( $response);
}

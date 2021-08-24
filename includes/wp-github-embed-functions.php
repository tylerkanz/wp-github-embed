<?php
//Get From GitHub -- Pass endpoint.
function fetch_from_github($endpoint) {
    $options = [
    'headers'     => [
        'Content-Type' => 'application/json',
    ],
];

    $result = wp_remote_get($endpoint);
    return $result;
}

?>
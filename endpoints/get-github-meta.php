<?php
add_action('rest_api_init', 'rest_get_route');

function rest_get_route()
{
    register_rest_route(
        'wp',
        'v1/get-git-meta',
        array(
            'methods' => 'GET',
            'callback' => 'rest_get_test',
        )
    );
}

function rest_get_test()
{
    // $verified = wp_verify_nonce($req->get_header('x_wp_nonce'), 'wp_rest');
return new WP_REST_Response('This is a GET Route', array('status' => 200));
    $url = 'https://api.github.com/users/tylerkanz';
    // $http_req = wp_remote_post($url, array(
    //     'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
    //     'method'      => 'GET',
    //     'data_format' => 'body',
    // ));

    // var_dump();
    


    

    // Example Error
    // return new WP_Error('Bad Request', __('invalid params'), array('status' => 400));

}
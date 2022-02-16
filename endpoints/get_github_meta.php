<?php
add_action('rest_api_init', 'rest_get_route');

function rest_get_route()
{
    register_rest_route(
        'api',
        'v1/getGitMeta',
        array(
            'methods' => 'GET',
            'callback' => 'rest_get_test',
        )
    );
}

function rest_get_test($req)
{
    wp_verify_nonce('wp_rest');

    var_dump($req);
    


    return new WP_REST_Response('This is a GET Route', array('status' => 200));

    // Example Error
    // return new WP_Error('Bad Request', __('invalid params'), array('status' => 400));

}
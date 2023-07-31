<?php

function ccb_rest_api()
{
  // example.com/wp-json/ccb/v1/signup
  register_rest_route('ccb/v1', '/signup', [
    'methods' => WP_REST_Server::CREATABLE,
    'callback' => 'ccb_rest_api_signup_handler',
    'permission_callback' => '__return_true'
  ]);
  // example.com/wp-json/ccb/v1/signin
  register_rest_route('ccb/v1', '/signin', [
    'methods' => WP_REST_Server::EDITABLE,
    'callback' => 'ccb_rest_api_signin_handler',
    'permission_callback' => '__return_true'
  ]);
}

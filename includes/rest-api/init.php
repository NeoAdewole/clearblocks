<?php

function ccb_rest_api()
{
  // example.com/wp-json/ccb/v1/signup
  register_rest_route('ccb/v1', '/signup', [
    'methods' => 'POST',
    'callback' => 'ccb_rest_api_signup_handler',
    'permission_callback' => '__return_true'
  ]);
}

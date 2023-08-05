<?php

use function FakerPress\register;

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

  // example.com/wp-json/ccb/v1/rate
  register_rest_route('ccb/v1', '/rate', [
    'methods' => WP_REST_Server::CREATABLE,
    'callback' => 'ccb_rest_api_rating_handler',
    'permission_callback' => 'is_user_logged_in'
  ]);

  register_rest_route('ccb/v1', '/daily-social', [
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'ccb_rest_api_daily_social_handler',
    'permission_callback' => '__return_true'
  ]);
}

<?php

function ccb_rest_social_query($args, $request)
{
  // meta_value_num 
  $orderBy = $request->get_param('orderByRating');

  if (isset($orderBy)) {
    $args['orderby'] = 'meta_value_num';
    $args['meta_key'] = 'social_rating';
  }

  return $args;
}

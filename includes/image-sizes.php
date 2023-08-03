<?php

function clearblocks_custom_image_sizes($sizes)
{
  return array_merge($sizes, [
    'teamMember' => __('Team Member', 'cc-clearblocks')
  ]);
}

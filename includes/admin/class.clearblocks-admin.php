<?php
defined('ABSPATH') or die('Cant access this file directly');

class Clearblocks_Admin
{
  private static $initiated = false;

  public static function init()
  {
    if (!self::$initiated) {
      self::init_hooks();
    }
  }

  public static function init_hooks()
  {
    self::$initiated = true;
  }

  public static function admin_menu()
  {
    Clearblocks_Menu::ccb_admin_menus();
  }
}

<?php
require 'init.php';
require 'lib/adianti/core/AdiantiCoreApplication.php';

$xml = new SimpleXMLElement(file_get_contents('menu.xml'));
$menu = new TMenu($xml, null, 1, 'tree');
$menu->class = 'menu menu-column menu-rounded menu-sub-indention px-3';
$menu->id    = 'kt_app_sidebar_menu';

ob_start();
$menu->show();
file_put_contents('test_menu_output.txt', ob_get_clean());

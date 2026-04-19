<?php
require 'init.php';
$form = new PerangkatForm();
$container = $form->getElements()[0];
var_dump(count($container->fields));

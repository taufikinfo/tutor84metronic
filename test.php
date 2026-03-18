<?php
require 'init.php';
try {
    $page = new ShadcnShowcase();
    $page->show();
    echo "SUCCESS";
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n" . $e->getFile() . ":" . $e->getLine();
}

<?php
$c = file_get_contents('app/lib/metro/util/KIcon.php'); 
$tests = ['server', 'data', 'abstract-9', 'archive', 'package', 'abstract-14', 'menu']; 
foreach($tests as $t) { 
    if (strpos($c, "'{$t}'") !== false) echo "FOUND: $t\n"; else echo "MISSING: $t\n"; 
}

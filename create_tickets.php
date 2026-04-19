<?php
$db = new PDO('sqlite:app/database/app.db'); 
$db->exec("DROP TABLE IF EXISTS tickets");
$db->exec("CREATE TABLE tickets (id INTEGER PRIMARY KEY AUTOINCREMENT, subject TEXT, product TEXT, status_progress INTEGER, perangkat_id INTEGER)");
$db->exec("INSERT INTO tickets (subject, product, status_progress, perangkat_id) VALUES ('Server down', 'Server', 1, 1)");
$db->exec("INSERT INTO tickets (subject, product, status_progress, perangkat_id) VALUES ('Database issues', 'Database', 2, 2)");
$db->exec("INSERT INTO tickets (subject, product, status_progress, perangkat_id) VALUES ('Network slow', 'Network', 4, 3)");
echo "Table tickets recreated successfully";

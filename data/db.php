<?php
// connect to the database using the PDO object
$db = new SQLite3('data/music.db');
// check if connection was successful
if (!$db) {
    die('Connection failed: ' . $db->lastErrorMsg());
}

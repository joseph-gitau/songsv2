<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('music.db');
    }
}
$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
} else {
    // $channel_name = $_GET['channels'];
    $sql = "SELECT * FROM songs";
    $results = $db->query($sql);
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        print_r($row);
    }
}

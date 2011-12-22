<?php

$link = mysql_connect('xxxxx', 'xxx', 'xxx');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db('moodle');

?>
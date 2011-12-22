<?php

$link2= mysql_connect('127.0.0.1', 'root', '88Boom!', 'medals');
if (!$link2) {
die('Could not connect: ' . mysql_error());
}
//echo 'Connected to medals';

mysql_select_db('medals') or die ('Unable to select the database');

?>
<?php

$mysqli = new mysqli('xxx', 'xxx', 'xxx', 'moodle');

if ($mysqli->errno) {
    echo 'error connecting' . $mysqli->error;
}



?>
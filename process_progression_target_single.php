<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 29/11/11
 * Time: 10:40
 * To change this template use File | Settings | File Templates.
 */

include('moodle_connection_mysqli.php');


$query = "SELECT * FROM progression_single_target WHERE studentid='" . $_POST['studentid'] . "'";

$result = $mysqli->query($query);

$num_rows = $result->num_rows;

if ($num_rows == 1) {
    $query = "UPDATE progression_single_target SET target='" . $_POST['target'] . "' WHERE studentid='" . $_POST['studentid'] . "'";
    $mysqli->query($query);
        echo $query;
} else {
    $query = "INSERT INTO progression_single_target (studentid, target) VALUES ('" . $_POST['studentid'] . "','" . $_POST['target'] . "')";
    $mysqli->query($query);
    echo $query;
}


 echo '<meta http-equiv="refresh" content="0;url=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $_POST['courseid'] . '&id=' . $_POST['studentid'] . '#tabs-8">';






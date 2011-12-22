<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 23/11/11
 * Time: 16:50
 * To change this template use File | Settings | File Templates.
 */
 
$learnerid = $_POST['studentid'];
$studentname = $_POST['studentname'];
$courseid = $_POST['courseid'];
$target = $_POST['target'];
$date = $_POST['date'];
$setby = $_POST['currentuser'];

include('moodle_connection_mysqli.php');


// get highest number taret for this student

$query = "SELECT max(number) as number FROM progression_targets";

$result = $mysqli->query($query);

while ($row = $result->fetch_object()) {
    $number =  $row->number;
}

$number ++;

$date = date("Y-m-d h:i:s", strtotime($date));

echo $date;

$query = "INSERT INTO progression_targets (studentid, target, date, setby, number) VALUES ('". $learnerid . "','" . $target . "','" . $date . "','" . $setby . "','" . $number . "')";
echo $query;

$result = $mysqli->query($query);


echo '<meta http-equiv="refresh" content="1;url=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $learnerid . '#tabs-8">';




?>
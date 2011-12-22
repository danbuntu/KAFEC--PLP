<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 24/08/11
 * Time: 14:34
 * Procee the set the not_applicable flag
 */
require_once('moodle_connection_mysqli.php');
include('../../../../config.php');

$moodleid = $_GET['stunum'];
$courseid = $_GET['courseid'];
$studentnum = $_POST['studentnum'];

//echo 'moodleid' . $moodleid;
//echo 'courseid' . $courseid;
//echo 'studentnum' . $studentnum;


// use replace based on the unqie index on the learner number to stop having to run a check query

$queryCheck = "SELECT * FROM parental WHERE student_id='" . $studentnum . "'";
echo $queryCheck;
$resultCheck = $mysqli->query($queryCheck);

if ($result->num_rows == 0) {
    $queryInsert = "INSERT INTO parental (student_id, not_applicable) VALUES ('" . $studentnum . "', '1')";
//    echo $queryInsert;
    $mysqli->query($queryInsert);
} else {
    $queryUpdate = "UPDATE parental SET not_applicable='1' WHERE student_id='" . $studentnum . "'";
//    echo $queryUpdate;
    $mysqli->query($queryUpdate);
}


echo '<h2>Please wait while we set the flag and redirect you</h2>';
echo '<meta http-equiv="Refresh" content="0;URL=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $moodleid . '"/>';
?>
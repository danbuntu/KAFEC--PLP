<?php

require_once('moodle_connection_mysqli.php');
include('../../../../config.php');

$moodleid = $_GET['stuid'];
$courseid = $_GET['courseid'];
$studentnum = $_POST['studentnum'];
$reviewScore = $_POST['reviewScore'];

// Check that an option has been selected
if ($reviewScore == '-') {
    echo '<h1>You must select a score option</h1>';
    echo '<meta http-equiv="Refresh" content="3;URL=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $moodleid . '"/>';
    break;
}


$query = "INSERT INTO flightplan (student_id, score, date) VALUES ('" . $studentnum . "','" . $reviewScore . "',NOW())";
//    echo $query;
$mysqli->query($query);
echo '<h2>Please wait while we add your score</h2>';
echo '<meta http-equiv="Refresh" content="0;URL=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $moodleid . '"/>';
?>
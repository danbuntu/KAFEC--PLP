<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 13/09/11
 * Time: 09:53
 * Process the student induction form
 */

echo '<h2>Processing changes to the induction list</h2>';

//include("../../config.php");
//print_r($CFG);

include('moodle_connection_mysqli.php');
$student_number = $_POST['studentnum'];
//$moodleid = $_POST['moodleid'];
//$courseid = $_POST['courseid'];
//$root = $_POST['root'];
//echo $student_number;

// check that all are on
    $finished = 'on';
    $finishedDate = date("d-m-Y h:i:s");

//echo ' $finished is' . $finished;

//echo $set . '<br/>';
$query = "INSERT INTO induction (learner_ref, finished, date_finished) VALUES ('" . $student_number . "', 'on','" . $finishedDate . "')";
//echo $query;
//echo $query;

$mysqli->query($query);

//echo '<meta http-equiv="Refresh" content="1;URL=' . $root . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $moodleid . '"/>';
echo '<meta http-equiv="Refresh" content="1;URL=' . $root . '/blocks/ilp/view.php"/>';
?>
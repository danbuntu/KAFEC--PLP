<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 24/11/11
 * Time: 16:17
 * To change this template use File | Settings | File Templates.
 */
 $learnerid = $_POST['studentid'];
$studentname = $_POST['studentname'];
$courseid = $_POST['courseid'];
$target = $_POST['target'];
$date = $_POST['date'];
$setby = $_POST['setby'];
$id = $_POST['id'];
$checkbox = $_POST['checkbox'];

echo ' checkbox ' . $checkbox;


if ($checkbox == 'on') {
    $checkbox = '1';
} else {
    $checkbox = '0';
}

include('moodle_connection_mysqli.php');
echo '<div id="badges">';

// get highest number taret for this student

$date = date("Y-m-d h:i:s", strtotime($date));

echo $date;

$query = "UPDATE progression_targets SET  target='" . $target . "', date='" . $date . "', setby='" . $setby . "', completed='" . $checkbox . "' WHERE id='" . $id . "'";
echo $query;

$result = $mysqli->query($query);


echo '<meta http-equiv="refresh" content="1;url=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $learnerid . '#tabs-8">';



?>
</div>
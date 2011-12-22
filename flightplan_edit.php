<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 02/08/11
 * Time: 16:02
 * To change this template use File | Settings | File Templates.
 */

include('moodle_connection_mysqli.php');
require_once("../../../../config.php");

if (empty($_SESSION['stuid'])) {
    $_SESSION['stuid'] = $_GET['student'];
}

$courseid = $_GET['courseid'];
echo 'courseid is: ' . $courseid . '<br/>';

if (empty($_SESSION['corid'])) {
    $_SESSION['corid'] = $courseid;
}

if (empty($_SESSION['stumid'])) {
    $_SESSION['stumid'] = $_GET['stunum'];
}

echo 'var:';
echo 'Student: ', $_GET['student'], ' stunum: ', $_GET['stunum'], ' courseid: ', $_GET['courseid'];

if (isset($_POST['update'])) {
//    echo 'test';
    // Write in the effectiveness scores
    echo 'Update the effectiveness <br/>';

    $query = 'UPDATE flightplan SET score="' . $_POST['score'] . '" date="' . $_POST['date'] . '" WHERE id="' . $_POST['id'] . '"';
    echo $query . '<br/>';
    $mysqli->query($query);
    echo 'update button';
}

if (isset($_POST['delete'])) {
    $query = "DELETE FROM flightplan WHERE id='" . $_POST['id'] . "'";
    echo $query;
    $mysqli->query($query);
    echo 'delete button';
}

$studentNumber = $_SESSION['stuid'];

//echo  $_SESSION['corid'];
//        echo  $_SESSION['stumid'];


echo '<h1>Edit Existing Flightplan Scores for ', $studentNumber, '</h1>';

echo '<a href="', $CFG->wwwroot, '/blocks/ilp/view.php?courseid=', $_SESSION['corid'], '&id=', $_SESSION['stumid'], '"><img src="./pix/back-icon.png" width="30px" border="0">Back to students plp</a>';

$query = "SELECT * FROM flightplan WHERE student_id='" . $studentNumber . "'";
//echo $query;
$result = $mysqli->query($query);

?>
<table>
    <tr>
        <th>ID</th>
        <th>Score</th>
        <th>Date</th>
        <th>Edit Buttons</th>
        <th></th>
    </tr>

<?php
while ($row = $result->fetch_object()) {
    echo '<form action="flightplan_edit.php" method="POST" >';
    echo '<tr><td>';
    echo $row->id;
    echo '</td><td>';
    echo '<input type="input" name="score" value="' . $row->score . '"/>';
    echo '</td><td>';
    echo '<input type="text" name="date" value="' . $row->date . '"/>';
    echo '<input type="hidden" name="id" value="' . $row->id . '"/>';
    echo '</td><td>';
    echo '<input type="submit" name="update" value="Update"/>';
    echo '</form>';
    echo '</td><td>';
    echo '<form action="flightplan_edit.php" method="POST" >';
    echo '<input type="hidden" name="id" value="' . $row->id . '"/>';
    echo '<input type="submit" name="delete" value="Delete"/>';
    echo '</form>';
    echo '</td></tr>';
}
    ?>
</table>
<?php


?>
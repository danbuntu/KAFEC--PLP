<?php

/*
 * Connect to the flightplan database and get the MTG for a student
 */

$linkmtg = mysql_connect('xxx', 'xxx', 'xxx', 'flightplan');//
if (!$linkmtg) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected to medals';

mysql_select_db('flightplan') or die('Unable to select the database');

//strip the leading 0
$student_number_nolead = intval($student_number);

//echo 'student number is: ' . $student_number;

$query = "SELECT * FROM students WHERE learner_code=" . $student_number_nolead;
//echo $query;

$resultmtg = mysql_query($query);
$num_rows = mysql_num_rows($resultmtg);
$mtgcount = 1;
//echo 'num rows is: ' . $num_rows;

if ($num_rows == 0) {
    $mtg_self = 'MTG not set on Self Calculator';
} elseif ($num_rows > $mtgcount) {
    $mtg_self = 'To many rows returned, Dupe in MTG self calculator';
}  elseif ($num_rows == $mtgcount) {
    while ($row = mysql_fetch_assoc($resultmtg)) {
        $mtg_self = $row['mtg'];
    }

}

mysql_close($linkmtg);
?>
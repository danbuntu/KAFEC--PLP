<?php

include('GoogChart.class.php');
include('chart_function.php');

include('get_attendence.php');
include('badges_databaseconnection.php');


// get the student name
$studentname = $user->username;
//echo 'Student name issss: ' . $studentname;


$querygetid = "SELECT * FROM students WHERE students_name='" . $studentname . "'";
//echo '<br/>' . $query_getid . '<br/>';
//$query_badges = "SELECT * FROM badges AS bd left JOIN badges_link AS bdl on bd.id=bdl.badge_id where student_id=' . $student_id . '";

$resultid = mysql_query($querygetid);

//print_r($resultid);
//echo $resultid;
//echo 'test2';

while ($row2 = mysql_fetch_assoc($resultid)) {
    $student_badgeid = $row2['id'];
}
//echo 'Student badge id: ' . $student_badgeid;


$query_flightplan = "SELECT * FROM reviews AS re left JOIN students AS stu on re.student_id=stu.id where stu.id='" . $student_badgeid . "' ORDER BY re.review_number";

//echo $query_flightplan;
// Zero out the review score varibles

$r1 = 0;
$r2 = 0;
$r3 = 0;
$r4 = 0;

//echo $query_flightplan;
$reviews = mysql_query($query_flightplan);
$num_or_rows = mysql_num_rows($reviews);
//echo 'Rows is: ' . $num_or_rows;
$reviewcount = 1;
//echo '<h2>Current reviews for this year ' . $year . '</h2>';
//echo 'Date is: ' . $date . '<br/>';
//echo the reviews already in the system
while ($row = mysql_fetch_assoc($reviews)) {

    //use varible varibles to create varibles as it loops though
    $name = 'r' . $reviewcount;
    $$name = $row['calculated'];
    $MTG = $row['mtg'];
    $QCA = $row['qca'];


    $reviewcount = $reviewcount + 1;
}

// antoher queury to pull the manual mtg grade regardless of wether a review is set
$querymtg = "SELECT * FROM students where students.id='" . $student_badgeid . "'";

// antoher queury to pull the manual mtg grade regardless of wether a review is set
$querymtg = "SELECT * FROM students where students.id='" . $student_badgeid . "'";
//echo $querymtg;
$mtgquery = mysql_query($querymtg);
$mtgquery = mysql_fetch_array($mtgquery);
$MTG = $mtgquery['2'];


// the query draws in rows based on flightplan - rewrite or add a new query to bring in mtg regardless of flightplan status
// check is the mtg record is set the datbase and sert tring accordingly
if ($MTG == NULL) {
    $MTG = 'Manual MTG not set';
}


//echo 'review scores are: ';
//echo 'r1 is: ' . $r1 . ' r2 is: ' . $r2 . ' r3 is ' . $r3 . ' r4 is: ' . $r4;
//echo '<br/>Count is; ' . $reviewcount;
//echo 'Rows is: ' . $num_or_rows;
//@FIXME this is a horribly kludge and needs to be done properly

if ($r1 == 110) {
    $r1 = 40 + 15;
} elseif ($r1 == 105) {
    $r1 = 40 + 10;
} elseif ($r1 == 100) {
    $r1 = 40 + 0;
} elseif ($r1 == 95) {
    $r1 = 40 - 5;
} elseif ($r1 == 90) {
    $r1 = 40 - 10;
} elseif ($r1 == 85) {
    $r1 = 40 - 15;
} elseif ($r1 == 80) {
    $r1 = 40 - 20;
} elseif ($r1 == 75) {
    $r1 = 40 - 25;
}


if ($r2 == 110) {
    $r2 = 50 + 15;
} elseif ($r2 == 105) {
    $r2 = 50 + 10;
} elseif ($r2 == 100) {
    $r2 = 50 + 0;
} elseif ($r2 == 95) {
    $r2 = 50 - 5;
} elseif ($r2 == 90) {
    $r2 = 50 - 10;
} elseif ($r2 == 85) {
    $r2 = 50 - 15;
} elseif ($r2 == 80) {
    $r2 = 50 - 20;
} elseif ($r2 == 75) {
    $r2 = 50 - 25;
}


if ($r3 == 110) {
    $r3 = 60 + 15;
} elseif ($r3 == 105) {
    $r3 = 60 + 10;
} elseif ($r3 == 100) {
    $r3 = 60 + 0;
} elseif ($r3 == 95) {
    $r3 = 60 - 5;
} elseif ($r3 == 90) {
    $r3 = 60 - 10;
} elseif ($r3 == 85) {
    $r3 = 60 - 15;
} elseif ($r3 == 80) {
    $r3 = 60 - 20;
} elseif ($r3 == 75) {
    $r3 = 60 - 25;
}

if ($r4 == 110) {
    $r4 = 70 + 15;
} elseif ($r4 == 105) {
    $r4 = 70 + 10;
} elseif ($r4 == 100) {
    $r4 = 70 + 0;
} elseif ($r4 == 95) {
    $r4 = 70 - 5;
} elseif ($r4 == 90) {
    $r4 = 70 - 10;
} elseif ($r4 == 85) {
    $r4 = 70 - 15;
} elseif ($r4 == 80) {
    $r4 = 70 - 20;
} elseif ($r4 == 75) {
    $r4 = 70 - 25;
}
//echo 'r1 is: ' . $r1 . ' r2 is: ' . $r2 . ' r3 is ' . $r3 . ' r4 is: ' . $r4;

/** Create chart */
$chart = new GoogChart();

// Set graph data
$data = array(
    //hardcoded values to give a nice line to the predicted progress
//spaces the target points along the graph
    'spacing target' => array(
        'START' => 0,
        'P 1' => 25,
        'P 2' => 50,
        'P 3' => 75,
        'MTG QCA' => 100,
    ),
    'Target Progress Score' => array(
        'START' => 30,
        'P 1' => 40,
        'P 2' => 50,
        'P 3' => 60,
        'MTG QCA' => 70,
    ),
    //spaces the progress points along the graph
    'spacing progress' => array(
        'START' => 0,
        'P 1' => 25,
        'P 2' => 50,
        'P 3' => 75,
        'MTG QCA' => 100,
    ),
//set scores based on flightplan information
    'Actual Progress Score' => array(
        'START' => 20,
        'P 1' => $r1,
        'P 2' => $r2,
        'P 3' => $r3,
        'MTG QCA' => $r4,
    ),
);

// Clear out array values if a progress review hasn't been carried out

if ($r1 <= 1) {
    unset($data['Actual Progress Score']['P 1']);
}

if ($r2 <= 1) {
    unset($data['Actual Progress Score']['P 2']);
}

if ($r3 <= 1) {
    unset($data['Actual Progress Score']['P 3']);
}

if ($r4 <= 1) {
    unset($data['Actual Progress Score']['MTG QCA']);
}

// echo the data array for debugging
//print_r($data);
// Set graph colors
$color = array(
    '#3c3c3c',
    '#029f9d',
    '#ff0000',
);

/* # Chart 1 # */
echo '<h2>Student Flightplan</h2>';
$chart->setChartAttrs(array(
    'type' => 'linespecify',
    'title' => ' ',
    'data' => $data,
    'size' => array(420, 220),
    'color' => $color,
    'width' => '5,5,4|5',
    //set the dots on the markers - note no spaces
    'marker' => 'd,3c3c3c,0,-1,6|d,99C754,0,-1,6',
    //'axiscolour' => '0,0000DD,13,0,t',
));
// Print chart
echo $chart . '<br/>';
echo '<table><td style="text-align: center;">';
echo '<img src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/legend.png" alt="legend"/>';
echo '</td></table>';

if (has_capability('block/ilp_student_info:viewclass', $context)) {
    //    echo 'attis ' . round($totalattendance);
    echo '<form id="flightplan" action="' . $url . '/badges/flightplan_details.php?var1=' . fullname($user) . '&var2=' . $user->username . '&var3=' . $user->id . '&var4=' . $courseid . '&var5=' . $student_number . '&var6=' . round($totalattendance) . '" method="post"><input type="submit" value="Enter/ Edit Reviews"></form>';
}

//include down here to stop the database opening and breaking the flightplan graph
include('mtg_import-backup.php');

if (($MTG != 'Manual MTG not set') && (!has_capability('block/ilp_student_info:viewclass', $context))) {
    echo '<table style="text-align: center; font-size: 25px; color: #70a02b; margin-left: auto; margin-right: auto; width: 100%;"><tr><td>Minimum Target Grade</td></tr>';
    echo '<tr><td style="text-align: center; color: teal;  font-size: 30px;"><font color=#26B1E0>' . ucwords($MTG) . '</font></td></tr>';
    echo '</table>';
} else {

    echo '<table  style="font-size: 20px; color: #70a02b; margin-left: auto; margin-right: auto; width: 100%;">';
    echo '<th style="text-align: center; width: 26%">';
    echo '<small>MTG from <br/>Self Calculator </small><br/>';
    echo '</th><th style="text-align: center;">';
    echo 'MTG Grade <br/>from Flightplan:</th>';
    echo '</th><th style="text-align: center; width: 26%;">';
    echo '<small>MTG Grade <br/>from MIS:</small></th></tr>';
    echo '<tr><td style="text-align: center; color: teal"><small>' . $mtg_self . '</small></td>';
    echo '<td style="text-align: center; color: teal"><font color=#26B1E0>' . $MTG . '</font></td>';
    echo '<td style="text-align: center; color: teal"><small>' . $mtg_grade . '</small></td></tr>';
    echo '</table>';
    echo '<table  style="font-size: 14px; color: #70a02b; margin-left: auto; margin-right: auto; width: 100%;">';
    echo '<tr><th style="text-align: center">QCA Points from MIS</th style="text-align: center"><th>MTG points from MIS</th></tr>';
    echo '<tr><td style="text-align: center; color: teal">' . $qca . '</td><td style="text-align: center; color: teal">' . $mtg_points . '</td></tr>';
    echo '</table>';
    echo '<table  style="font-size: 14px; color: #70a02b; margin-left: auto; margin-right: auto; width: 100%;"><tr><th>';
    echo 'Primary qual type is</th>';
    echo '<td>' . $primary_qual . '</td></tr></table>';

}

mysql_close($link2);
?>
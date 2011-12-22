<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$studentname = $user->username;

$query_badges = "SELECT * FROM badges AS bd left JOIN badges_link AS bdl on bd.id=bdl.badge_id where student_id='" . $user->idnumber . "'";
//echo $query_badges . '<br/>';

$badges = mysql_query($query_badges);

$badgesnumber = mysql_num_rows($badges);
//echo 'badfgesnumber is: ' . $badgesnumber;

//Only show the badges block if there are actual badges

accord_first('Achievements');

echo 'Hover the mouse over an achievement to see the award criteria';
while ($row3 = mysql_fetch_assoc($badges)) {

    //echo all badges the students has in their own divs to allow them to float and flow
    echo '<div id="small_badges">';
    echo '<img title="' . $row3['name'] . ' - ' . $row3['description'] . '" src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/badges/images/' . $row3['icon'] . '.png" ><br/>';
    //    echo str_replace(":", "<br/>", $row3['name']);
    echo '</div>';

}

// show old badges

include('badges_databaseconnection.php');

//echo 'Student name issss: ' . $studentname;

$query_getid = "SELECT * FROM medals.students WHERE students_name='" . $studentname . "'";
//echo '<br/>Old Medals ' . $query_getid . '<br/>';
//    $query_badges = "SELECT * FROM medals.badges AS bd left JOIN medals.badges_link AS bdl on bd.id=bdl.badge_id where student_id=' . $student_id . '";
//echo $query_badges;
$resultid = mysql_query($query_getid);
$num_rows = mysql_num_rows($resultid);


if ($num_rows > 0) {

    //print_r($resultid);
    //echo $resultid;
    //echo 'test2';

    while ($row2 = mysql_fetch_row($resultid)) {
        $student_badgeid = $row2['0'];
    }
    //echo 'Student badge id: ' . $student_badgeid;

    //echo 'student badge is is: ' . $student_badgeid;
    $query_badges = "SELECT * FROM medals.badges AS bd left JOIN medals.badges_link AS bdl on bd.id=bdl.badge_id where student_id='" . $student_badgeid . "'";
    //    echo $query_badges . '<br/>';

    $badges = mysql_query($query_badges);

    $badgesnumber = mysql_num_rows($badges);
    //echo 'badfgesnumber is: ' . $badgesnumber;

    //Only show the badges block if there are actual badges
    if ($badgesnumber >= 1) {

        while ($row3 = mysql_fetch_row($badges)) {

            //echo all badges the students has in thier own divs to allow them to float and flow
            echo '<div id="small_badges">';
            echo '<img Title="' . $row3['3'] . '" src="' . $CFG->wwwroot . '/badges/images/' . $row3['2'] . '.png" ><br/>';
            echo '</div>';

        }
    }
}


if (has_capability('block/ilp_student_info:viewclass', $context)) {
    echo '<br/><form id="medals" action="./templates/custom/badges/selectbadge.php?var1=' . fullname($user) . '&var2=' . $user->idnumber . '&var3=' . $user->id . '&var4=' . $courseid . '" method="post"><input type="submit" value="Edit Achievements"></form>';
}

accord_last();


mysql_close($link2);
?>
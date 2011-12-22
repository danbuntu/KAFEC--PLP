<?php

//@TODO change the query to select based on student number
//@TODO change submit button to submit based on student number and badges selected

echo '<link rel="stylesheet" type="text/css" href="' . $siteurl . '/theme/midkent_newstyle/style.css" />';
echo '<link rel="stylesheet" type="text/css" href="./styles.css" />';


$var1 = $_GET['var1'];
$var2 = $_GET['var2'];
$var3 = $_GET['var3'];
$var4 = $_GET['var4'];
$var5 = $_GET['var5'];

//echo 'Student is: ' . $var1 . '<br/>';
//echo 'Student id is: ' . $var2 . '<br/>';
//include('databaseconnection.php');

include('../../../../../config.php');
//include('check_student.php');

//$query = "SELECT * FROM badges_link where student_id='" . $var2 . "'";
//$query = "SELECT * FROM badges";
//Select join the badges and badges_link tables and use or is null to print out all results from the badge table
$query = "SELECT * FROM badges AS bd left JOIN badges_link AS bdl on bd.id=bdl.badge_id where student_id='" . $var2 . "'";

echo '<br/>' . $query;
//echo '<br/><h2>result of query</h2><br/>';
$result = mysql_query($query);
$rows = mysql_num_rows($result);
//echo 'rows' . $rows;
//print_r($result);


// select all the badges
$queryBadges = "SELECT * FROM badges";
//echo $queryBadges;
$badges = mysql_query($queryBadges);
$num_badges = mysql_num_rows($badges);
// echo 'Total number of badges is: ' . $num_badges;

echo '<form id="medals"  action="badgeselected.php" method="post">';
echo '<div id="badges">';

$count = 0;
if (mysql_num_rows($badges) > 0) {
    echo '<div id="one_badge">';
    echo '<h1>Select achievements for ' . $var1 . '</h1>';

    // get the categories

    $query = "SELECT * FROM badges_category";
    //echo $query;
    $resultCat = mysql_query($query);

    while ($row2 = mysql_fetch_assoc($resultCat)) {
        echo '<table class="headers"><tr><td><b>';
        echo $row2['name'] . ':</b> ' . $row2['text'] . '<br/>';
        echo '</td></tr></table>';
        $id = $row2['id'];


        $queryBadges = "SELECT * FROM badges WHERE category='" . $id . "'";
        $badges = mysql_query($queryBadges);

        echo '<div id="wrapper">';

        while ($row = mysql_fetch_assoc($badges)) {
            //@TODO
            echo '<div id="single_badge" style="float: left;height: 250px; width: 200px;text-align: center;";>';
            // echo 'id: ' . $row['id'] . '<br/>';
            echo '<b>Name: ' . $row['name'] . '</b><br/>';
            // echo 'Icon name: ' . $row['icon'] . '<br/>';
            echo '<div class="badge">';
            echo '<img src="./images/' . $row['icon'] . '.png"><br/>';
            echo '</div>';
            echo $row['description'] . '<br/>';
            $count = $count + 1;
            //check to see if the student has been awarded the badge and check of uncheck the box as needed
            $query = "SELECT * FROM badges AS bd left JOIN badges_link AS bdl on bd.id=bdl.badge_id where student_id='" . $var2 . "'";
            $student_badge = mysql_query($query);

            //check through the badge links table and where results are found that match the badge time check the box
            while ($row2 = mysql_fetch_assoc($student_badge)) {
                if ($row['id'] == $row2['badge_id']) {
                    // echo 'a match!<br/>';
                    //set the selected varible to print out a checked box
                    $selected = 'checked="yes"';
                } else {
                    // leave empty so as to print nothing if there is no match

                }
            }

            echo '<input type="hidden" name="name[]" value="' . $row['name'] . '"/>';
            echo '<input type=checkbox name="badge_' . $row["id"] . '"' . $selected . '"/><br/>';
            echo '<input type="hidden" name="value2[]" />';
            echo '<input type="hidden" name="student_number" value="' . $var2 . '"/>';
            echo '</div>';

            // clear the selected string
            $selected = '';
        }

    }

} else {
    echo 'no record found';
}

echo '</div>';
echo '<div id="badges_submit">';
echo '<input type="hidden" name="studentid" value="' . $var2 . '"/>';
echo '<input type="hidden" name="count" value="' . $count . '"/>';
echo '<input type="hidden" name="studentname" value="' . $var1 . '"/>';

echo '<input type="hidden" name="courseid" value="' . $var4 . '"/>';
echo '<input type="hidden" name="studentmoodleid" value="' . $var3 . '"/>';
echo '<input type="hidden" name="learnerref" value="' . $var5 . '"/>';
echo '<input type="image" src="' . $siteurl . '/badges/images/save-icon.png" title="Save badges"/>';
echo '</form></div>';
//echo '<div><form method="link" action="http://s-moodledev/blocks/ilp/view.php?courseid=' . $var4 . '&id=' . $var3 . '"><input type="submit" value="Back to PLP" ></form>';
//echo $var4 . ' and ' . $var3;


echo '<div id="backbutton"><a href="' . $siteurl . '/blocks/ilp/view.php?courseid=' . $var4 . '&id=' . $var3 . '"><img style="border: 0px;" title="Back to Students PLP" src="' . $siteurl . '/badges/images/bt-left-icon.png"></a></div>';

echo '</div>';

?>
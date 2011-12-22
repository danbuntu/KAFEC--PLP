<?php

//        include('databaseconnection.php');

include('../../../../../config.php');

        include('../automation/automation_lib.php');

        include('../connections/corero_conection_testing.php');


        echo "<h1>Please wait one moment. Don't worry everythings going to be OK</h1>";
        echo 'Saving changes.......';
//echo 'badgeselected';

//print_r($_POST['name']);
//print_r($_POST['value2']);
        $studentid = $_POST['studentid'];
        $count = $_POST['count'];
        $studentmoodleid = $_POST['studentmoodleid'];
        $courseid = $_POST['courseid'];
        $studentname = $_POST['studentname'];


//times the count by 5 to fix issue with badges id tables being screwed up after deletions
        $count = $count * 5;
        $student_number = $_POST['student_number'];
        echo 'Studentid is: ' . $studentid . '<br/>';
        echo 'Studentname is: ' . $studentname . '<br/>';
        echo 'Student number is: ' . $student_number . '<br/>';
        echo 'Count is: ' . $count . '<br/>';
        echo 'student moodle id is; ' . $studentmoodleid . '<br/>';
        echo 'Course id is: ' . $courseid . '<br/>';
        echo '<br/>';

for ($i = 1;
    $i <= $count;
    $i++) {
    if (isset($_POST['badge_' . $i])) {
        echo 'is checked<br/>';
        // select the studentid and medal_id from the badges_link table to see if it already exists
        $query2 = "SELECT * FROM badges_link where student_id='" . $student_number . "' and badge_id='" . $i . "'";
        echo 'query2 is: ' . $query2;
        $result = mysql_query($query2);
        // count the number of rows returned by query2
        $num_rows = mysql_num_rows($result);
        echo 'num rows: ' . $num_rows;
        //check number of returned rows and insert record if it doesn't already exist
        if ($num_rows <= 0) {
            $query = "INSERT INTO badges_link (student_id, badge_id) VALUES ('" . $student_number . "','" . $i . "')";
            echo $query;
            mysql_query($query);
            echo '<br/>';


            // Send the student an email to say that they have had a badge added

            $query = "SELECT id, email, idnumber FROM mdl_user WHERE id='" . $studentmoodleid . "' AND username not like 'G%'";
            echo $query;
            $studentmail = mysql_query($query);
            while ($row = mysql_fetch_assoc($studentmail)) {
                $to = $row["email"];
//                $to = 'dan.attwood@midkent.ac.uk';
                $studentId = $row["idnumber"];
                echo $to;
                echo 'studentid1 is: ' . $studentId;

                $headers = 'From: plp@midkent.ac.uk';
                $message = "Congratulations you have been awarded a medal on your PLP.

            Please visit it soon to see which one you've been given.";
                $subject = "Medal awarded on your Moodle PLP";
                mail($to, $subject, $message, $headers);

echo 'studentid:' . $studentId;
                // Get the guardian email
//                $to = getGuardianEmail($studentId);
//echo 'to: ' . $to;
//                $headers = 'From: plp@midkent.ac.uk';
//                $message = "Good news!  Your Ward has been awarded a medal on their PLP.
//
//Please visit their PLP soon to see which one they have been assigned.
//
//
//          http://moodle.midkent.ac.uk";
//                $subject = "Medal awarded on your wards Moodle PLP";
//                mail($to, $subject, $message, $headers);


    }

            } else {
                echo 'record already exists';
            }

            // delete the record from the badges_link table if the checkbox isn't checked
        } else {
            echo 'is not checked<br/>';
            $query = "DELETE FROM badges_link WHERE badge_id='" . $i . "' AND student_id='" . $student_number . "'";
            echo $query;
            mysql_query($query);
            echo '<br/>';
        }

    }
    $url = $siteurl . '/blocks/ilp/view.php?courseid=' .  $courseid . '&id=' . $studentmoodleid . '';

echo '<div id="backbutton"><a href="' . $siteurl  . '/blocks/ilp/view.php?courseid=' .  $courseid . '&id=' . $studentmoodleid . '"><img style="border: 0px;" title="Back to Students PLP" src="' . $siteurl  . '/badges/images/bt-left-icon.png"></a></div>';


    echo 'URL is: ' . $url . '<br/>';


    // Redirect to the orginal PLP page
    echo '<meta http-equiv="refresh" content="0;url=' . $url . '">';

    ?>

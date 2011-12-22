<?php
//Accordian from https://anasnakawa.wordpress.com/2011/01/25/jquery-ui-multi-open-accordion/
// needs refactoring to work with moodle included yui
//include the section to make the accordion menu work - warning hardcoded
//get the course id form the url -
$courseid = $_GET['courseid'];
$studentid = $_GET['id'];
//echo 'test;';
//check if it can get the student id from the url if not select is from the logged in user
if ($studentid == '') {
    $studentid = $USER->id;
    echo 'id from user is: ' . $studentid;
}


include('moodle_connection_mysqli.php');

?>
<!-- Load the main javscript Asynchronously-->
<script id="myscript2" type="text/javascript">

    (function() {
        var myscript2 = document.createElement('script');
        myscript2.type = 'text/javascript';
        myscript2.src = ('<?php echo $CFG->wwwroot ?>/blocks/ilp/templates/custom/jscriptssync.js');
        var s = document.getElementById('myscript2');
        s.parentNode.insertBefore(myscript2, s);
    })();

</script>


<!--    <script id="myscript3" type="text/javascript">-->
<!---->
<!--    (function() {-->
<!--        var myscript3 = document.createElement('script');-->
<!--        myscript3.type = 'text/javascript';-->
<!--        myscript3.src = ('--><?php //echo $CFG->wwwroot ?><!--/blocks/ilp/templates/custom/jscriptssync2.js');-->
<!--        var s = document.getElementById('myscript3');-->
<!--        s.parentNode.insertBefore(myscript3, s);-->
<!--    })();-->
<!---->
<!--</script>-->
    
<?php

//get the students login id

$query = "SELECT username, institution FROM mdl_user WHERE id=" . $studentid;
//echo $query;
$result = mysql_query($query);

while ($row = mysql_fetch_assoc($result)) {
    $login = $row['username'];
    $campus = $row['institution'];
    //  echo '$campus is : ' . $campus;
    // echo '$login is : ' . $login;
}

//include ('accord.php');
//include ('accord2.php');


include('soap_connection.php');
include('functions_lib.php');
include ('accord_functions.php');
include('corero_conection.php');

//
//echo 'id number ' . $user->idnumber;
//// grab the student number early on and strip to 8 digits. This is then passed to the queries
$student_number = $user->idnumber;
$student_number = substr($student_number, 0, 8);

//echo 'courseid is ' . $courseid;
//echo 'studentid is ' . $studentid;
//echo 'student number is ' . $student_number;

// Part of the tempate core NOT TO BE REMOVED!
include ('access_context.php');

//Get current year
$year = date(Y);

include('academic_year.php');

?>
<!--<script>-->
<!--(function () {-->
<!--    var e = document.createElement('script');-->
<!--    e.src = 'http://moodledev.midkent.ac.uk/blocks/ilp/templates/custom/jscripts.js';-->
<!--    e.async = true;-->
<!--    document.getElementById('fb-root').appendChild(e);-->
<!--    document.getElementById('fb-root').appendChild(e);--
<!--}());-->
<!--</script>-->


<!-- load jquery -->
<?php
echo '<script src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/jquery/js/jquery-1.6.2.min.js"></script>';
echo '<script src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>';
echo '<script src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/jquery/js/jquery.multi-open-accordion-1.0.1.js"></script>';
echo '<script src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/jquery/js/jquery.qtip-1.0.0-rc3-dm.min.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/jquery/css/jquery.qtip.min.css" />';
echo '<link rel="stylesheet" href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/jquery/css/custom-theme/jquery-ui-1.8.9.custom.css">';
echo '<link rel="stylesheet" type="text/css" href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/accordcss.css" />';
echo '<link rel="stylesheet" type="text/css" href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/onscreen.css" media="screen"/>';
echo '<link rel="stylesheet" type="text/css" href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/print.css" media="print"/>';
?>
<!-- check if the broswer is ie 7 and load a diffrent style sheet -->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="http://moodledev.midkent.ac.uk/blocks/ilp/templates/custom/onscreenie7.css" /><![endif]-->


        <!-- Load the main javascript Asynchronously-->

    <script id="myscript" type="text/javascript">

(function() {
 var myscript = document.createElement('script');
 myscript.type = 'text/javascript';
 myscript.src = ('http://moodledev.midkent.ac.uk/blocks/ilp/templates/custom/jscripts.js');
 var s = document.getElementById('myscript');
 s.parentNode.insertBefore(myscript, s);
})();

</script>


<!-- start the tabs -->
<div class="demo">
<!-- define the tabs for the menu -->
<div id="tabs">
<ul>
    <li><a href="#tabs-1">PLP</a></li>
    <li><a href="#tabs-2">Exams</a></li>
    <li><a href="#tabs-3">Results</a></li>
    <li><a href="#tabs-4">Student's Progress Archive</a></li>
    <li><a href="#tabs-5">Guardian/ Employer Access</a></li>
    <li><a href="#tabs-6">Induction Checklist/ Campus Rules</a></li>
    <li><a href="#tabs-7">Employability Passport</a></li>
    <li><a href="#tabs-8">Progression Targets</a></li>
    <?php if (has_capability('block/ilp_student_info:viewclass', $context)) { ?>
<!--    <li><a href="#tabs-5">Text Student</a></li>-->
    <?php } ?>

</ul>
<div id="tabs-1">


<!-- Begin layout table -->
<!-- table to enclose the report and make it go full screen on firefox -->
<table style="width: 100%;">
<tr>
<td>

<div id="hidden">
    <table width="100%">
        <tr>
            <td>
                <img src="http://moodle.midkent.ac.uk/theme/midkent_newstyle/logos/logo_mid_kent_college2.png">

            </td>
            <td><h1>PLP for <?php echo fullname($user); ?></h1></td>
        </tr>
    </table>
</div>

<!-- sits as the top of the page so that info is loaded first to dispaly latter, ie the photo -->
<div id="flightplan">

<?php

include('check_user.php');
    include('faculty.php');
    include('student_active.php');
//        echo 'test';
    include('qca.php');
    include('primary_quals.php');

//    include('flightplan.php');

echo $student_number;
    // call the flightplan creation page as an image and pass it the student number
    echo '<img src="templates/custom/flightplan_graph.php?var1=' , $student_number , '">';
    include('flightplan_form.php');
    include('mtg.php');

    echo '<br/>';

//    echo 'test';
 include('induction_check.php');
    include('attendence_headline.php');
    include('attendance_3_wks.php');
    include('parental.php');
    ?>
    <div id="multiOpenAccordion5" style="text-align: center;">
<?php
include('assessment_tracker.php');
    ?>
    </div>
    <div id="multiOpenAccordion2">
<?php
include('passport_display.php');
include('badges.php');
    ?>
    </div>
    <div id="multiOpenAccordion4">
<?php

include('learner_details2.php');
include('student_photo.php');

    include('cast2.php');
    include('qualifications.php');
    include('attendance_live.php');
    include('other_actions.php');
    include('profiler.php');

    ?>
    </div>
</div>

<div id="plp">
<div class="generalbox" id="ilp-profile-overview">
    <div id="info">

        <table class="infotable" style="width: 100%;">
            <tr>
                <td>
                    <h1>
<?php
echo '<a href="' . $CFG->wwwroot . '/user/view.php?' . (($courseid) ? 'courseid=' . $courseid . '&' : '') . 'id=' . $id . '">';
    echo '<div id="fullname">' . $learnername . '</div>';
    echo '</a>';

    if ($CFG->ilpconcern_status_per_student == 1) {
        //Orignal line to show students name and status
        //echo '<span class="main status-' . $studentstatusnum . '" style="margin-left:20px">' . (($access_isuser) ? get_string('mystudentstatus', 'ilpconcern') : get_string('studentstatus', 'ilpconcern')) . ': ' . $thisstudentstatus . '</span>';
    }
    ?>
                    </h1>

                </td>
            </tr>
            <tr>
                <td>

                    <table style="width: 100%;">
                        <tr>
                            <td  rowspan="3">
<?php
//comment out original line
//print_user_picture($user, (($courseid) ? $courseid : 1), $user->picture, 100);
// call the photo include to get the student photo and display it
//assigns a class to allow the max width to be set via the css
                                echo  '<div id="multiOpenAccordion6">';
                                accord_first('Click to see student photo');
                                echo '<img class="student_photo" src=https://studentphotos.midkent.ac.uk/' . $studentphoto . '><br/>';
                                accord_last();
                                echo '</div>';
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
<?php
//set the students number and trim to 8 characters
    echo '<b><big<big>Student Name is : </b>' . fullname($user) . '</big></big><br/>';
    echo '<b><big<big>Student Number is : </b>' . $student_number . '</big></big><br/>';
    echo '<b><big<big>Date of birth is: </b>' . $dob . '</big></big><br/>';
    echo '<b><big<big>Campus is: </b>' . $campus . '</big></big><br/>';
    echo '<b><big<big>Faculty is: </b>';
    foreach ($studentFaculty as $row) {
        echo $row[4] . ',';
    }
    echo '</big></big><br/>';

                                ?>
                            </td>

                            <td style="vertical-align: top; text-align: center;">

                                <!-- set the traffic light based on the students status -->
<?php
echo '<big>Student Status</big><br/>';

                                if ($thisstudentstatus == 'Green') {
                                    echo '<a href="' . $CFG->wwwroot . '/mod/ilpconcern/concerns_view.php?courseid=' . $courseid . '&userid=' . $studentid . '&status=2"><img src="./pix/light01.png"/></a>';
                                    echo '<div id="lightcolour">Green</div>';
                                } elseif ($thisstudentstatus == 'Amber') {
                                    echo '<a href="' . $CFG->wwwroot . '/mod/ilpconcern/concerns_view.php?courseid=' . $courseid . '&userid=' . $studentid . '&status=2"><img src="./pix/light03.png"/></a>';
                                    echo '<div id="lightcolour">Amber</div>';
                                } else {
                                    echo '<a href="' . $CFG->wwwroot . '/mod/ilpconcern/concerns_view.php?courseid=' . $courseid . '&userid=' . $studentid . '&status=2"><img src="./pix/light02.png"/></a>';
                                    echo '<div id="lightcolour">Red</div>';
                                }
                                ?>
<!--          <img src="./pix/help-browser.png"  id="opener"/>-->

                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>


    <!-- end general box -->
</div>

<div id="main_boxes">
    <div id="multiOpenAccordion">

<?php
accord_first('Student Info');

    if ($config->ilp_show_student_info == 1) {
        echo '<div class="generalbox" id="ilp-student_info-overview">';
        display_ilp_student_info($id, $courseid);
        echo '</div>';
    }

    accord_last();

    accord_first('Student Targets');

    if ($config->ilp_show_targets == 1) {
        echo '<div class="generalbox" id="ilp-target-overview">';
        display_ilptarget($id, $courseid);
        echo '</div>';
    }
    accord_last();

//// count the records in the smartarr array
//        $count = count($smartarr);
//// echo 'count is: ' . $count;
//// print_r($smartarr);
////only show the targets box if the array has something in it
//        if ($count >= 1) {
//            accord_first('Cast SMART Targets');
//            //loop through the results and print them out
//            for ($i = (int)0; $i < $count; $i++) {
//
//                echo '<div id="ilp-target-overview">';
//                echo '<div class="block_ilp_ilptarget">';
//                echo '<div class="ilp_post yui-t4">';
//                echo '<div class="bd" role="main">';
//                echo '<div class="yui-main">';
//                echo '<div class="yui-b">';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">SMART Objective:</div>';
//                echo '<div class="yui-u">' . $smartarr[$i]['0'] . '<p></div>';
//                echo '</div>';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">Resources:</div>';
//                echo '<div class="yui-u">' . $smartarr[$i]['1'] . '<p></div>';
//                echo '</div>';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">Relevant Evidence:</div>';
//                echo '<div class="yui-u">' . $smartarr[$i]['3'] . '<p></div>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//                echo '<div class="yui-b">';
//                echo '<ul>';
//                echo '<li>Objective Number: ' . $smartarr[$i]['5'] . '</li>';
//                echo '<li>Set By: ' . $smartarr[$i]['4'] . '</li>';
//                $date = strtotime($smartarr[$i]['2']);
//                echo '<li>Deadline: ' . date("d F Y", $date) . '</li>';
//                echo '</ul>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//            }
//            accord_last();
//        }


include('cast_targets.php');

//Destroy the smartarr array as we don't need it any more
        unset($smartarr);

        accord_first("Student's Progress");

        if ($config->ilp_show_concerns == 1) {
            $i = 1;
            while ($i <= 4) {
                if (eval('return $CFG->ilpconcern_report' . $i . ';') == 1) {

                    echo '<div class="generalbox" id="ilp-concerns-overview">';
                     display_ilpconcern_by_year($id, $courseid, $i, $academicYearStamp, 'current');
                    echo '</div>';
                }
                $i++;
            }
        }

        accord_last();

//// Cast reviews
//// count the records in the smartarr array
//        $count = count($reviewarr);
//// print_r($reviewarr);
////only show the targets box if the array has something in it
//        if ($count >= 1) {
//            accord_first('Cast Reviews');
//            //loop through the results and print them out
//            for ($i = (int)0; $i < $count; $i++) {
//
//                echo '<div id="ilp-target-overview">';
//                echo '<div class="block_ilp_ilptarget">';
//                echo '<div class="ilp_post yui-t4">';
//                echo '<div class="bd" role="main">';
//                echo '<div class="yui-main">';
//                echo '<div class="yui-b">';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">Support to Date:</div>';
//                echo '<div class="yui-u">' . $reviewarr[$i]['2'] . '<p></div>';
//                echo '</div>';
//                echo '<br/>';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">Review of Support:</div>';
//                echo '<div class="yui-u">' . $reviewarr[$i]['3'] . '<p></div>';
//                echo '</div>';
//                echo '<br/>';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">Details of changes:</div>';
//                echo '<div class="yui-u">' . $reviewarr[$i]['4'] . '<p></div>';
//                echo '</div>';
//                echo '<br/>';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">Perfomance Against SMART Targets:</div>';
//                echo '<div class="yui-u">' . $reviewarr[$i]['7'] . '<p></div>';
//                echo '</div>';
//                echo '<br/>';
//                echo '<div class="yui-gd">';
//                echo '<div class="yui-u first">New SMART Targets Set:</div>';
//                echo '<div class="yui-u">' . $reviewarr[$i]['8'] . '<p></div>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//                echo '<div class="yui-b">';
//                echo '<ul>';
//
//                echo '<li>Tutor: ' . $reviewarr[$i]['6'] . '</li>';
//                $date = strtotime($reviewarr[$i]['1']);
//                echo '<li>Date: ' . date("d F Y", $date) . '</li>';
//                echo '</ul>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//                echo '</div>';
//            }
//            accord_last();
//        }



        include('cast_reviews.php');
        unset($resultCast);

//                                                accord_first('Personal Reports');
//
//                                                if ($config->ilp_show_personal_reports == 1) {
//
//                                                    display_ilp_personal_report($id, $courseid);
//                                                }
//                                                accord_last();

        accord_first('Subject Report');


        if ($config->ilp_show_subject_reports == 1) {
            echo '<div class="generalbox" id="ilp-subject_report-overview">';
            display_ilp_subject_report($id, $courseid);
            echo '</div>';
        }

        accord_last();
        ?>

    </div>

</div>
</div>

<!-- moved to the bottom due to speed hit of calling the user accounts block -->

<?php
// MIS test stuff
echo '<div id="external_databases">';

// echo the button for printing and assign div to hide it when printing
echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<div id="printbutton"><table style="text-align: center;"><td>';
echo '<a href="https://s-web1.midkent.ac.uk/portal"><img style="border: 0px;" src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/colour-people.png"   title="Update My Details"/><br/>Update My <br>Student Details</a>';
echo '</td><td>';
echo '<input type="image" src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/document-print.png"  onClick="window.print()"   value="Print This Page" alt="Print this page"/><br/>Print this page</a>';
echo '</td></table></div>';
echo '</div>';
?>
<!-- The folowing uses a javascript to check that the page has loaded if it has finished loading then it loads the ad details section
this is because the ad section takes long time to load and this way the page is useable whilst the ad section loads in the background -->

</td>
</tr>
</table>

</div>
<div id="tabs-2">

    <?php include('exams2.php'); ?>

</div>


<div id="tabs-3">

    <?php include('results.php'); ?>

</div>


<!--Archive tab-->
    <div id="tabs-4">

        Below are the Progress reviews, Concerns, Reasons for status changes and Contribuitons for previous years. <p/>Please note that all previous targets can be accessed from the targets screen (click on the targets heading).
        <?php
               if ($config->ilp_show_concerns == 1) {
            $i = 1;
            while ($i <= 4) {
                if (eval('return $CFG->ilpconcern_report' . $i . ';') == 1) {

                    echo '<div class="generalbox" id="ilp-concerns-overview">';
                     display_ilpconcern_by_year($id, $courseid, $i, $academicYearStamp, 'archive');
                    echo '</div>';
                }
                $i++;
            }
        }

?>
        </div>

<div id="tabs-5">
<?php

    echo 'You can click below to change you guardian password and to see the status of your account';
    echo '<iframe name="guardian" width="100%" height="415" frameborder="0" src="https://guardianaccess.midkent.ac.uk/default.asp?id=' . $login . '&campus=' . $campus . '">';
    echo '</iframe>';
    ?>
</div>

<div id="tabs-6">
<?php


 include('induction_checklist.php');
    ?>
</div>

<div id="tabs-7">
<?php


 include('passport.php');
    ?>
</div>

<div id="tabs-8">
<?php


 include('progression_targets.php');
    ?>
</div>


</div>

<!--<div id="tabs-5">-->
<?php
//if (has_capability('block/ilp_student_info:viewclass', $context)) {
//    include('txt.php');
//}
//    ?>
<!---->
<!--</div>-->

</div>
</div>

<?php
// close the mssql connection
include('mysql_close.php');
include('unset_arrays.php');
//include('jscripts.php');
//echo '<script src="http://moodledev.midkent.ac.uk/blocks/ilp/templates/custom/jscripts.js"></script>';


?>


<!--    <!-- Help dialog -->-->
<!--<div class="demo">-->
<!---->
<!--    <div id="dialog" title="Traffic Light Help">-->
<!---->
<!--        <object width="425" height="350" type="application/x-shockwave-flash" data="https://vshare.midkent.ac.uk/player/player.swf"><param name="movie" value="https://vshare.midkent.ac.uk/player/player.swf"><param name="flashvars" value="&file=https://vshare.midkent.ac.uk/xml_playlist.php?id=136&height=350&image=https://vshare.midkent.ac.uk/thumb/4ca4238a0b/136.jpg&width=425&location=https://vshare.midkent.ac.uk/player/player.swf&logo=https://vshare.midkent.ac.uk/templates/images/watermark.gif&link=http://s-moodle.midkent.ac.uk&linktarget=_blank"/></object>-->
<!---->
<!--        </div>-->
<!--</div>-->


        <div id="dialog"></div>

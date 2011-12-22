<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 02/08/11
 * Time: 13:31
 * Grab the existing MTG and formats it for view by the student and editing by the tutor
 */

if (isset($_POST['submitMTG'])) {
    // use replace based on the unqie index on the learner number to stop having to run a check query
    $query = "REPLACE INTO mtg (student_id, mtg, tutor_mtg) VALUES ('" . $student_number . "','" . strtoupper($_POST['mtg']) . "','" . strtoupper($_POST['tutormtg']) . "' )";
    //            echo $query;
    $mysqli->query($query);
}


//display the mtg block
// get the mtg
$query = "SELECT * FROM mtg WHERE student_id='" . $student_number . "'";
$result = $mysqli->query($query);

while ($row = $result->fetch_object()) {
    $MTG = $row->mtg;
    $tutorMTG = $row->tutor_mtg;
}

// Show only the manual mtg when viewed by a student and other sections have been filled in
if (($MTG != 'Manual MTG not set') && (!has_capability('block/ilp_student_info:viewclass', $context))) {
    echo '<table style="text-align: center; font-size: 25px; color: #70a02b; margin-left: auto; margin-right: auto; width: 100%;"><tr><td>Minimum Target Grade</td></tr>';
    echo '<tr><td style="text-align: center; color: teal;  font-size: 30px;"><font color=#26B1E0>' . ucwords($MTG) . '</font></td></tr>';
    echo '</table>';
} else {
    echo '<br/>';
    echo '<table width="100%" style="text-align: center;">';
    echo '<tr class="darkblue"><th>Tutor MTG</th><th>Personal Best</th><th>MTG from MIS</th></tr>';
    echo '<tr class="lightblue"><td>', $tutorMTG, '</td><td>', $MTG, '</td><td>', substr($mtg_grade, 1), '</td></tr>';
    echo '<tr><th class="darkblue">Primary Qual type</th><td class="yellow" colspan="2">';
    foreach ($resultStudent as $item) {
        echo $item['Qual_type'] .'<br/>';

    }
  
    echo '</td></tr>';
    echo '<tr>';
    echo '<th class="darkblue">QCA Points</th><td class="yellow" colspan="2">';
    if (empty($qca)) {
        echo 'QCA points from MIS not available';
    } else {
    echo $qca;
    }
    echo '</td>';
    echo '</tr>';
    echo '</tr></table>';
}

if (has_capability('block/ilp_student_info:viewclass', $context)) {
    // clear down the sessions from the edit forms
    ?>

<a href="<?php echo $CFG->wwwroot; ?>/blocks/ilp/templates/custom/Flight_Plan_Prior_Attainment_Calculator.xlsm"><img
        src="<?php $CFG->wwwroot; ?>/blocks/ilp/templates/custom/pix/download_icon.png" width="25" height="25">Download
    the Prior Attainment Calculator Spread Sheet</a><br/>
<a href="<?php echo $CFG->wwwroot; ?>/blocks/ilp/templates/custom/Guide_to_setting_MTGs.xlsx"><img
        src="<?php $CFG->wwwroot; ?>/blocks/ilp/templates/custom/pix/download_icon.png" width="25" height="25">Download
    the Guide to setting the MTG</a>
<br/>
<b></b><a href="https://gateway.lsc.gov.uk/VADT/AttainmentCalculator.aspx"><img
        src="<?php $CFG->wwwroot; ?>/blocks/ilp/templates/custom/pix/link.png" width="25" height="25">Online prior
    calculator</a></b><br/>
username: isp\College Account <br/>
password: MidKent2011

<br/>

<div id="MTGHeaderDivImg">
    <a id="imageDivLink2"
       href="javascript:toggle5('MTGContentDivImg', 'imageDivLink2', 'Add or Amend Personal Best/ Tutor set MTG');"><img
            src="/blocks/ilp/templates/custom/pix/plus.png"><b>Add or Amend Personal Best/ Tutor set MTG</b></a>
</div>
<div id="MTGContentDivImg" style="display: none;">

    <h2>Add/ Alter the Personal Best/ Tutor set MTG</h2>
    <?php
        echo 'The above MIS MTG is calculated based on:<br/>';

    foreach ($resultStudent as $item) {
        echo $item['Qual_Title'] .  ' - '  . $item['Qual_type'] .'<br/>';

    }
    ?>

    <table>
        <tr>
            <td style="width:200px;">
                <form method="post" action="<?php echo $_SELF; ?>">
                    <b>Tutor set MTG</b>
                    <input type="text" name="tutormtg" id="mtg" value="<?php echo $tutorMTG; ?>"/>
                    <b>Personal Best</b>
                    <input type="text" name="mtg" id="mtg" value="<?php echo $MTG; ?>"/>


            </td>
            <td style="width:2px;">
                <input type="hidden" id="studentnum" name="studentnum" value="<?php echo $student_number; ?>">
                <input id="submitMTG" type="submit" name="submitMTG" value="submit_change"/>
                </form>
            </td>
        </tr>
        <tr>
            <th>Help</th>
        </tr>
        <tr>
            <td>
                <b>Tutor Set MTG:</b> For use when the MIS generated MTG is not available. Tutors/students should use
                the prior attainment calculator to establish their average points score (APS) from their prior
                qualifications. The APS is then used to establish the MTG using the ‘guide to setting the MTG’.
                <br/><b>Personal Best:</b> This is the ‘aspirational’ target which should be agreed between tutor and
                student at the first student review.

            </td>
        </tr>


    </table>

</div>
    <?php

}
?>

<!--Script to run the submit button graphic - doesn't work when added to the main js script files-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#submitMTG').hover(function() {
            $(this).addClass('mhover')
        }, function() {
            $(this).removeClass('mhover');
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submitTutorMTG').hover(function() {
            $(this).addClass('mhover')
        }, function() {
            $(this).removeClass('mhover');
        });
    });
</script>

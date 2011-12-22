<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 13/09/11
 * Time: 10:59
 * Check that the induction checklist has been finished
 */

$query = "SELECT * FROM induction WHERE learner_ref='" . $student_number . "' AND finished='on'";
//echo $query;
$result = $mysqli->query($query);
$tick = '';
if ($result->num_rows == 1) {

    while ($row = $result->fetch_object()) {

        if ($row->finished == 'on') {
            echo '<h2>Induction checklist finished<img src="./templates/custom/pix/tick-icon.png" width="32" height="32"/></h2>';
            echo 'induction finished on ' . $row->date_finished;
            $tick = 'on';
        }
    }
} else {
    echo '<h2>Induction checklist not finished<img src="./templates/custom/pix/delete-icon.png" width="32" height="32"/></h2>';
}

// Show the box to the student to allow them to mark the induction list as checked

if ($tick != 'on') {

    if (has_capability('block/ilp_student_info:viewclass', $context)) {

        echo '<div id="parental">I have completed all the tasks on the induction checklist and agree to abide by the campus rules (click the tick below)';
        echo 'Only students can click the tick</p>';
        echo '<input id="removeInduction" type="submit" name="removeInduction" value="submit_change"/>';
        echo '</div>';
    } else {

        ?>

    <form method="post"
          action="/blocks/ilp/templates/custom/induction_process.php?student=<?php echo $student_number; ?>&stunum=<?php echo $studentid; ?>&courseid=<?php echo $courseid; ?>$root=<?php echo $CFG->wwwroot;?>">
        <input type="hidden" id="studentnum" name="studentnum" value="<?php echo $student_number; ?>">

        <div id="parental">I have completed all the tasks on the induction checklist and agree to abide by the campus rules (click the tick below)</p>
            <input id="removeInduction" type="submit" name="removeInduction" value="submit_change"/>
        </div>
    </form>

    <?php

    }
}

?>

<!--Script to run the submit button graphic - doesn't work when added to the main js script files-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#removeInduction').hover(function() {
            $(this).addClass('mhover')
        }, function() {
            $(this).removeClass('mhover');
        });
    });
</script>

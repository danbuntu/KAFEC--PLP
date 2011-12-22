<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 02/08/11
 * Time: 13:31
 * To change this template use File | Settings | File Templates.
 */

//print_r($_SESSION);

if (isset($_POST['submitScore'])) {
    $query = "INSERT INTO flightplan (student_id, score, date) VALUES ('" . $student_number . "','" . $_POST['reviewScore'] . "',NOW())";
    //    echo $query;
    $mysqli->query($query);
}

if (has_capability('block/ilp_student_info:viewclass', $context)) {
    // clear down the sessions from the edit forms
    unset($_SESSION['corid']);
    unset($_SESSION['stumid']);
    unset($_SESSION['stuid']);
    ?>

<br/>

<div id="headerDivImg">
    <a id="imageDivLink" href="javascript:toggle5('contentDivImg', 'imageDivLink', 'Add a flightplan score');"><img
            src="/blocks/ilp/templates/custom/pix/plus.png"><b>Add a flightplan score</b></a>
</div>
<div id="contentDivImg" style="display: none;">

    <h2>Submit a flightplan review</h2>
    <table>
        <tr>
            <td style="width:200px;">
                <form method="post"
                      action="<?php echo $CFG->wwwroot, '/blocks/ilp/templates/custom/flightplan_add.php?stuid=' . $studentid . '&courseid=', $courseid; ?>">
                    Select review score
                    <select id="reviewScore" name="reviewScore">
                        <option class="">-</option>
                        <option class="" style="color:#00FF00">6</option>
                        <option class="" style="color:#32CC00">5</option>
                        <option class="" style="color:#669900">4</option>
                        <option class="" style="color:#996600">3</option>
                        <option class="" style="color:#CC3300">2</option>
                        <option class="" style="color:#FF0000">1</option>
                    </select>

            </td>
            <td style="width:2px;">
                <input type="hidden" id="studentnum" name="studentnum" value="<?php echo $student_number; ?>">
                <input id="submitFlightplan" type="submit" name="submitFlightplan" value="submit_change"/>
                </form>
            </td>
        </tr>
    </table>

    <table>
        <tr class="darkblue">
            <th>Score</th>
            <th>Description</th>
        </tr>
        <tr class="lightblue">
            <td><b>6</b></td>
            <td>The student is working above his/her Personal Best</td>
        </tr>
        <tr class="yellow">
            <td><b>5</b></td>
            <td>The student working at his/her Personal Best</td>
        </tr>
        <tr class="lightblue">
            <td><b>4</b></td>
            <td>The student is working above his/her Minimum Target  Grade</td>
        </tr>
        <tr class="yellow">
            <td><b>3</b></td>
            <td>The student is working at his/her Minimum Target  Grade</td>
        </tr>
        <tr class="lightblue">
            <td><b>2</b></td>
            <td>The student is working below his/her Minimum Target  Grade</td>
        </tr>
        <tr class="yellow">
            <td><b>1</b></td>
            <td>The student is working well below his/her Minimum Target  Grade</td>
        </tr>
    </table>

    <table>
        <tr>
            </td>
            <td>
                Edit previous scores >
            </td>
            <td>
                <form method="post"
                      action="/blocks/ilp/templates/custom/flightplan_edit.php?student=<?php echo $student_number; ?>&stunum=<?php echo $studentid; ?>&courseid=<?php echo $courseid; ?>">
                    <input id="editFlightplan" type="submit" name="editFlightplan" value="submit_change"/>
                </form>

        </tr>
    </table>


</div>
<?php } ?>



<!--Script to run the submit button graphic - doesn't work when added to the main js script files-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#submitFlightplan').hover(function() {
            $(this).addClass('mhover')
        }, function() {
            $(this).removeClass('mhover');
        });

        $('#editFlightplan').hover(function() {
            $(this).addClass('mhover')
        }, function() {
            $(this).removeClass('mhover');
        });
    });
</script>


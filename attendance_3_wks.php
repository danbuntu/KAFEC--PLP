<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 09/08/11
 * Time: 14:37
 * Fetchs the attendance for the last 3 weeks and dispaly it as a total
 * Has a dropdown to display details by course  
 */

//try {
//    $result3wks = $client->getAttendanceThreeWeeks($student_number);
//}
//
//catch (SoapFault $e) {
//    echo 'There has been an error getting the three week attendance';
//}


$result3wks = $client->__soapCall("getAttendanceThreeWeeks",array($student_number));


// get the last section of the array that contains the total
$lastArray = end($result3wks);

echo '<table width="100%" style="text-align: center"><tr class="darkblue"><th colspan="3">Attendance in the last 3 weeks</th></tr>';
echo '<tr class="lightblue"><th>Possible Sessions</th><th>Absent Sessions</th><th>Percentage</th></tr>';
echo '<tr class="yellow"><td>', $lastArray['Possible'], '</td><td>', $lastArray['Absent'], '</td><td>', $lastArray['Percentage'], '</td></tr>';
echo '</table>';

// get the size of the array
$size = count($result3wks);
$size2 = $size - 1;

// remove the last part of the array
$sliced = array_slice($result3wks, 0, $size2);

// Breakdown by course

?>
<div id="MTGHeaderDivImg3">
    <a id="imageDivLink3" href="javascript:toggle5('MTGContentDivImg3', 'imageDivLink3', '3 Week Breakdown');"><img
            src="/blocks/ilp/templates/custom/pix/plus.png"><b>3 Week Breakdown</b></a>
</div>
<div id="MTGContentDivImg3" style="display: none;">

<?php
foreach ($sliced as $item) {
    echo '<table width="100%" style="text-align: center" class="darkblue"><tr><th colspan="3">', $item['Course_Code'], ' ', $item['Course_Title'], '</th></tr>';
    echo '<tr class="lightblue"><th>Possible Sessions</th><th>Absent Sessions</th><th>Percentage</th></tr>';
    echo '<tr class="yellow"><td>', $item['Possible'], '</td><td>', $item['Absent'], '</td><td>', $item['Percentage'], '</td></tr>';
    echo '<tr class="lightblue"><th colspan="3">Marks</th></tr>';
    echo '<tr class="yellow" ><td colspan="3">', $item['Marks'], '</td></tr>';
    echo '</table>';
}
    ?>
    <!-- Explain the marks-->
    <p/>
    <table>
        <tr width="100%" class="darkblue">
            <th>Mark</th>
            <th>Explanation</th>
        </tr>
        <tr class="lightblue">
            <td>/</td>
            <td>Present in class</td>
        </tr>
        <tr class="yellow">
            <td>A</td>
            <td>Authorised Absence</td>
        </tr>
        <tr class="lightblue">
            <td>L</td>
            <td>Late to class (number denotes minutes late)</td>
        </tr>
        <tr class="yellow">
            <td>O</td>
            <td>Absent</td>
        </tr>
        <tr class="lightblue">
            <td>D</td>
            <td>Disruptive in class</td>
        </tr>
        <tr class="yellow">
            <td>C</td>
            <td>Early Completer</td>
        </tr>
        <tr class="lightblue">
            <td>E</td>
            <td>Exam/Trip/Rehearsal/Show/Event</td>
        </tr>
        <tr class="yellow">
            <td>I</td>
            <td>Authorised Illness</td>
        </tr>
        <tr class="lightblue">
            <td>R</td>
            <td>Religious Holiday</td>
        </tr>
        <tr class="yellow">
            <td>W</td>
            <td>Withdrawn</td>
        </tr>
        <tr class="lightblue">
            <td>X</td>
            <td>Left Class Early</td>
        </tr>
    </table>

</div>
<?php
unset($result);
unset($result3wks);
unset($sliced);

?>
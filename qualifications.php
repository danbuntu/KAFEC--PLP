<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 17/06/11
 * Time: 16:25
 * Displays the students qualifications using the XML server results
 */

//try {
//    $resultStudent = $client->getQualsById($student_number);
//}
//
//catch (SoapFault $e) {
//    // handle issues returned by the web service
//    echo '<br/>';
//    echo "No MIS records found for user " . $CFG->name;
//    echo " either the there is a problem with MIS or more likely the Student isn't enrolled for this year";
//    echo '<br/>Please wait a few moments and refresh the page';
//}

$resultStudent = $client->__soapCall("getQualsById",array($student_number));

accord_first('Current Courses');
//var_dump($resultStudent);
echo '<table>';
foreach ($resultStudent as $key => $item) {
    // Echo the titles
    $class = 'lightblue';
    foreach ($item as $iKey => $iItem) {
        if ($iKey == 'Name') {
            echo '<tr class="darkblue"><th colspan="2">', replaceUnderScore($iItem), '</th></tr>';
        } else {

            echo '<tr class="', $class, '"><th>', replaceUnderScore($iKey), '</th><td>', replaceUnderScore($iItem), '</td></tr>';
            // Switch the class to allow for stripping
            if ($class == 'lightblue') {
                $class = 'yellow';
            } else {
                $class = 'lightblue';
            }
        }
    }
}
echo '</table>';
accord_last();
unset($resultStudent);

?>
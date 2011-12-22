<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 28/07/11
 * Time: 10:05
 * Echo the learner details service information
 */

//try {
//$resultStudent = $client->__soapCall("getStudentInfoById", array($student_number));
//}
//
//catch(SoapFault $e){
//  // handle issues returned by the web service
//    echo '<br/>';
//   echo "No MIS records found for user " . $CFG->name;
//    echo " either the there is a problem with MIS or more likely the Student isn't enrolled for this year";
//    echo '<br/>Please wait a few moments and refresh the page';
//}

$resultStudent = $client->__soapCall("getStudentInfoById",array($student_number));

foreach ($resultStudent as $key => $item) {
    // Echo the titles

    accord_first(replaceUnderScore($key));
    echo '<table>';
    $class = 'lightblue';
    foreach ($item as $iKey => $iItem) {

        echo '<tr class="' , $class , '"><th>' , replaceUnderScore($iKey) , '</th><td>' , replaceUnderScore($iItem) , '</td></tr>';
// Switch the class to allow for stripping
        if ($class == 'lightblue') {
            $class = 'yellow';
        } else {
             $class = 'lightblue';
        }
    }
echo '</table>';
    accord_last();
}





unset($resultStudent);

?>
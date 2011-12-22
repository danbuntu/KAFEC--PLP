<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 26/10/11
 * Time: 10:13
 * To change this template use File | Settings | File Templates.
 */

try {
$resultCast = $client->__soapCall("getCastInfo", array($student_number));
} catch (SoapFault $E) {
    echo $E->faultstring;
}
// check for error

//print_r($resultCast);


foreach ($resultCast as $key => $item) {
//    echo $key;

if ($key == 'Error') {
    foreach ($item as $iKey => $iItem) {
        echo $iKey . ' ' . $iItem;
    }

}


    if ($key == 'Castdetails') {
        accord_firstcast('Student Support');

        echo '<table>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {

            echo '<tr class="', $class, '"><th>', replaceUnderScore($iKey), '</th><td>', replaceUnderScore($iItem), '</td></tr>';
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

}



//unset($resultCast);


?>
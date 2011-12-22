<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 28/07/11
 * Time: 14:34
 * Fetch the timestamp of the start of the current academic year.
 */


//try {
//    $resultYear = $client->__soapCall("getAcademicYear", array($student_number));
//}
//
//catch (SoapFault $e) {
//    // handle issues returned by the web service
//    echo ' There has been a problem getting the academic year';
//}


$resultYear = $client->__soapCall("getAcademicYear",array($student_number));


foreach ($resultYear as $key => $item) {
    $academicYearStamp = $item['timestamp'];
    $academicyear = $item['academicyear'];
}

//echo 'timestmap ' . $academicYearStamp;

unset($resultYear);
?>
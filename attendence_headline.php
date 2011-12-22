<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 24/06/11
 * Time: 10:50
 * To change this template use File | Settings | File Templates.
 */
//try {
//$resultAtt = $client->getAttendanceById($student_number);
//}
//
//catch(SoapFault $e){
//  // handle issues returned by the web service
//    echo ' There has been a problem getting the attendance from NG';
//}


$resultAtt = $client->__soapCall("getAttendanceById",array($student_number));

print_r($resultAtt);

$lastArray = end($resultAtt);

$totalattendance = $lastArray['Percentage'];

list($colour, $text) = attendancecolour($totalattendance);

echo '<div style="text-align: center; font-family: Verdana, Geneva, Arial, Helvetica; font-size: 32px; color: ' . $colour .  ';">Attendance ' , $totalattendance , '<br/>';
echo '<small><small>Attendance ' , $text , '</small></small></div>';

?>
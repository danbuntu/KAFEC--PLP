<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$qcaquery = "SELECT     STCM_Year AS Year, STCM_Student_ID AS StuID, STCM_QCA_Actual_C AS [College Score]
FROM         STCMCommon
WHERE     (STCM_Year = '". $academicyear . "') AND (STCM_Student_ID = '" . $student_number . "')";

//echo $qcaquery;
$qcasresult = mssql_query($qcaquery);

//print_r($qcasresult);

//echo 'QCA Score as logged with MIS<br/>';
//echo 'hardcoded to: 07041217<br/>';
//echo 'hardcoded to year: 2010<br/>';
// loop through the returned rows and print the results
while ($row = mssql_fetch_assoc($qcasresult)) {
    $qca =  $row['College Score'];
}



?>

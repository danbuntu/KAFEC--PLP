<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include ('corero_conection.php');
$attendquery = "SELECT     VREGT.REGT_Year AS Year, VREGT.REGT_Student_ID AS StuID, RTRIM(VREGT.REGT_Provision_Code) AS Course,
                      PRPIProvisionInstance.PRPI_Title AS [Course Title], SUM(CASE WHEN AttPresAbs = 'N' THEN 1 ELSE 0 END) AS Present,
                      SUM(CASE WHEN AttPresAbs IN ('Y', 'N') THEN 1 ELSE 0 END) AS Possible, SUM(CASE WHEN AttPresAbs = 'N' THEN 1 ELSE 0 END) AS Absent
FROM         REGHrghdr INNER JOIN
                      VREGT ON REGHrghdr.REGH_ISN = VREGT.REGT_REGH_ISN INNER JOIN
                      REGDropin ON VREGT.REGT_REGH_ISN = REGDropin.REGD_REGH_ISN AND VREGT.REGT_Student_ID = REGDropin.REGD_Student_ID INNER JOIN
                      PRPIProvisionInstance ON VREGT.REGT_Provision_Code = PRPIProvisionInstance.PRPI_Code AND
                      VREGT.REGT_Provision_Instance = PRPIProvisionInstance.PRPI_Instance LEFT OUTER JOIN
                          (SELECT     RGAT_Attendance_Code AS AttCode, RGAT_Present AS AttPresAbs
                            FROM          RGATAttendance
                            WHERE      (RGAT_Present = 'Y') OR
                                                   (RGAT_Present = 'N')) AS AttMark ON REGDropin.REGD_Attendance_Mark = AttMark.AttCode
WHERE     (REGHrghdr.REGH_Register_Type = 'T')
GROUP BY PRPIProvisionInstance.PRPI_Title, VREGT.REGT_Year, VREGT.REGT_Student_ID, RTRIM(VREGT.REGT_Provision_Code)
HAVING      (VREGT.REGT_Year ='" . $academicyear  . "') AND (VREGT.REGT_Student_ID ='" . $student_number . "' )
ORDER BY RTRIM(VREGT.REGT_Provision_Code)";

//echo $attendquery;
$attendresult = mssql_query($attendquery);
$number_of_rows2 = mssql_num_rows($attendresult);
//print_r($attendsresult);


//echo 'number of rows: ' . $number_of_rows2;
//zero the attendence values
$present = 0;
$possible = 0;
$absent = 0;

echo '<table>';
//echo 'Note hardcoded to student 07041217<br/>';
//echo 'Hardcoded to year 2009<br/>';
// loop thorugh the returned rows and print the results
if ($number_of_rows2 >= 1) {
while ($row = mssql_fetch_assoc($attendresult)) {
//    echo '<tr><th colspan="3">Course: ' . $row['Course Title'] . '</th></tr>';
    $presentdays = $row['Possible'] - $row['Present'];
//    echo '<tr><th>Possible</th><th>Present</th><th>Absent</th></tr>';
//    echo '<tr><td>' . $row['Possible'] . '</td>';
//    echo '<td>' . $presentdays . '</td>';
//    echo '<td>' . $row['Absent'] . '</td></tr>';
    $present = $present + $row['Present'];
$possible = $possible + $row['Possible'];
$absent = $absent + $row['Absent'];

}
    } else {
//    echo 'No qualification records found';
}
echo '</table>';


//echo 'Present: ' . $present . '<br/>';
//echo 'Possible: ' . $possible . '<br/>';
//echo 'Absent: ' . $absent . '<br/>';
$totalattendance = $presentdays/$possible;
// times by 100 to move deicmal place
$totalattendance = $totalattendance * 100;
//echo '<br/><b>Total attendance is: </b>' . round($totalattendance) . '%<br/>';
//echo 'get att is: ' . $totalattendance;
?>

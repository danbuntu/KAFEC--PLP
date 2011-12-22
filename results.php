<?php
/* 
 * Get and display exam results
 */

 echo '<a href="./templates/custom/STUDENTS_RESULT_LETTER.pdf">Click here for Important Exam Results Information</a>';
 
$queryCash = "select * from exssexmstsbj j
JOIN EXSJexsubject s ON s.EXSJ_Subject_Code=j.EXSS_Subject_Code
where exss_student_id='" . $student_number . "' and exss_year='2010'
AND EXSS_Act_Grade <> '' AND EXSJ_Description NOT LIKE '%SPANISH%' AND EXSJ_Description NOT LIKE '%WELSH%'";


$resultCash = mssql_query($queryCash);
$num_rows = mssql_num_rows($resultCash);
//echo 'num rows;' , $num_rows;

if ($num_rows >= 1  ) {
echo '<h3>Cashed Grades</h3>';
echo '<table style="text-align: left;">';
echo '<tr style="background-color: rgb(88, 153, 202);"><th>Subject Title</th><th>Grade</th><th>Numeric Grade</th></tr>';
while ($row = mssql_fetch_array($resultCash)) {

    // check the current value of back and output the correct colour
     if ($back == 1) {
            $background = ' style="background-color: rgb(220, 241, 249);"';
        } else {
            $background = ' style="background-color: rgb(252, 254, 222);"';
        }

 echo '<tr' . $background . '><td>' ,  $row['EXSJ_Description'] , '</td><td>' , $row['EXSS_Act_Grade'] , '</td><td>' , $row['EXSS_Numeric_Grade'] , '</td></tr>';

   // flip the value of $back
   if ($back == '1') {
            $back = '0';
        } else {
            $back = '1';
        }
 }

echo '</table>';
}

$query = "SELECT EXSJ_Description, EXPR_Description,  EXSS_ISN, EXSS_YEAR, EXSS_STUDENT_ID, EXSS_Subject_Code, EXSS_Series, EXSS_Awarding_body, EXSS_Provision_Code, EXSS_Numeric_Grade, EXSS_Act_Grade, EXSS_Actual_Grade_2, EXSS_Numeric_Score_2, EXSS_College_Centre, EXSJ_Level_Award, EXSP_Paper_Code, EXSP_Act_Grade, EXSP_Exam_Grade_Numeric
FROM EXSSexmstsbj j
JOIN EXSJexsubject s ON s.EXSJ_Subject_Code=j.EXSS_Subject_Code
LEFT OUTER JOIN EXSPexmstpap p on j.EXSS_Student_id=p.EXSP_Student_ID AND j.EXSS_Subject_code=p.EXSP_Subject_Code AND j.EXSS_Series=p.EXSP_Series
JOIN EXPRexpapers rp ON rp.EXPR_Paper_Code=p.EXSP_Paper_Code AND rp.EXPR_Subject_Code=p.EXSP_Subject_Code
where j.EXSS_Student_id='" . $student_number . "' and j.EXSS_Year='2010' AND j.EXSS_Withdrawn <> 'Y' AND exsj_description not like '%greek%'";

//echo $query;
$result = mssql_query($query);

$num_rows = mssql_num_rows($result);

if ($num_rows >= '1') {


echo '<table style="text-align: left;">';
echo '<tr style="background-color: rgb(88, 153, 202);"><th>Subject Title</th><th>Paper Title</th><th>Paper Code</th><th>Series</th><th  style="text-align: center;">Grade</th><th  style="text-align: center;">Numeric</th></tr>';

//set back to it's inital setting
$back = '0';

while ($row = mssql_fetch_assoc($result)) {

    // set some varibles
       $grade0 = trim($row['EXSS_Act_Grade']);
       $grade1 = trim($row['EXSS_Actual_Grade_2']);
    $grade3 =  trim($row['EXSP_Act_Grade']);


//if (!empty($grade3)){
//    echo '<h1>hhh</h1>';
//}

// Test that $grade has a value, else use grade 1
    if (!empty($grade3)) {
          $grade = $grade3;
    } elseif (!empty($grade0)) {
        $grade = $grade0;
    } else {
        $grade = $grade1;
    }

    $num0 = $row['EXSS_Numeric_Grade'];
    $num1 = $row['EXSS_Numeric_Score_2'];
    $num3 = $row['EXSP_Exam_Grade_Numeric'];
//set the numeric grade
  if (!empty($num3)) {
      $numgrade = $num3;
  } elseif (!empty($num0)) {
        $numgrade = $num0;
    } else {
        $numgrade = $num1;
    }

    $series = trim($row["EXSS_Series"]);
    $paperCode = trim($row["EXSP_Paper_Code"]);

    // check the current value of back and output the correct colour
     if ($back == 1) {
            $background = ' style="background-color: rgb(220, 241, 249);"';
        } else {
            $background = ' style="background-color: rgb(252, 254, 222);"';
        }

     echo '<tr' . $background . '><td>' . ucwords(strtolower($row["EXSJ_Description"])) . '</td><td>' . ucwords(strtolower($row['EXPR_Description'])) . '</td><td style="text-align: center;">' . $row['EXSP_Paper_Code'] . '</td><td style="text-align: center;">' . $row['EXSS_Series'] .  '</td><td style="text-align: center;">' . $grade . '</td><td style="text-align: center;">' . $numgrade . '</td>';

  // flip the value of $back
   if ($back == '1') {
            $back = '0';
        } else {
            $back = '1';
        }

}
echo '</table>';

} else {
    echo 'No results to show yet';
}

?>
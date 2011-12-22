<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


//student check in sutdents tables and create if don't exist
$querystudent = "SELECT * FROM students WHERE students_name='" . $var2 . "'";
//echo $querystudent . '<br/>';
$result = mysql_query($querystudent);
$num_rows = mysql_num_rows($result);

////check to see if a student exists in the table(a row is returned)
if ( $num_rows <= 0) {
    //the student record doesn't exist so create it
    $querycreate = "INSERT INTO students SET students_name='" . $var2 . "'";
 //   echo $querycreate;
        mysql_query($querycreate);
        //refresh the page to load the student_number from the database
       //echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $siteurl  . '/badges/flightplan_details.php?var1=' . $var1 . '&var2=' . $var2 . '&var3=' . $var3 . '&var4=' . $var4 . '">';
} elseif ($num_rows > 0) {
    //the students record exists so get the id

  //  echo $querygetid;
    $row = mysql_fetch_row($result);
   // print_r($student_number);
    //set the student_number for use later
    $student_number = $row['0'];
    $mtg = $row['2'];
     $qca = $row['3'];
   // echo 'Student id is: ' . $student_number;
}


?>

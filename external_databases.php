<?php


// begin custom template *******
function fixdob($realdob) {
    // reformat date of birth
    // echo $dob2 ;
    // convet the date to unix timestamp
    $unixtime = strtotime($dob2);
    // echo "unix time is $unixtime";
    // convert the timestamp to a properdate
    $realdob = date('d M Y', $unixtime);
    // echo "Realdob is $realdob";
    // echo '<br />';
    return $realdob;
}

function fixgender($gender2) {
    // Get the gender code and converts to full female or male
    // echo $gender;
    // echo '<br />';
    // check gender code and convert to string
    if ($gender == 'F') {
        $gender2 = 'Female';
    } elseif ($gender == 'M') {
        $gender2 = 'Male';
    } else {
        $gender2 = 'unknown';
    }
    return $gender2;
}

function ethnicity($eth2) {
    if ($eth = '99') {
        $eth2 = 'Not Known/Not Provided';
    } elseif ($eth = '98') {
        $eth2 = 'Any Other';
    } elseif ($eth = '14') {
        $eth2 = 'Asian or Asian British - Any Other Asian Background';
    } elseif ($eth = '11') {
        $eth2 = 'Asian or Asian British - Bangladeshi';
    } elseif ($eth = '12') {
        $eth2 = 'Asian or Asian British - Indian';
    } elseif ($eth = '13') {
        $eth2 = 'Asian or Asian British - Pakistani';
    } elseif ($eth = '15') {
        $eth2 = 'Black or Black British - African';
    } elseif ($eth = '16') {
        $eth2 = 'Black or Black British - Any Other Black Background';
    } elseif ($eth = '16') {
        $eth2 = 'Black or Black British - Caribbean';
    } elseif ($eth = '18') {
        $eth2 = 'Chinese';
    } elseif ($eth = '22') {
        $eth2 = 'Mixed - Any Other Mixed Background';
    } elseif ($eth = '19') {
        $eth2 = 'Mixed - White and Asian';
    } elseif ($eth = '20') {
        $eth2 = 'Mixed - White and Black African';
    } elseif ($eth = '21') {
        $eth2 = 'Mixed - White and Black Caribbean';
    } elseif ($eth = '25') {
        $eth2 = 'White - Any Other White Background';
    } elseif ($eth = '23') {
        $eth2 = 'White - British';
    } elseif ($eth = '24') {
        $eth2 = 'White - Irish';
    } elseif ($eth = ' ') {
        $eth2 = 'Not Known/Not Provided';
    }
    return $eth2;
}


function disability($dis2) {
    if ($dis = '98') {
        $dis2 = 'No Disability';
    } elseif ($dis = '01') {
        $dis2 = 'Visual Impairment';
    } elseif ($dis = '02') {
        $dis2 = 'Hearing Impairment';
    } elseif ($dis = '03') {
        $dis2 = 'Disability Affecting Mobility	';
    } elseif ($dis = '04') {
        $dis2 = 'Other Physical Disability';
    } elseif ($dis = '05') {
        $dis2 = 'Other Medical Condition (For Example Epilepsy, Asthma, Diabetes)';
    } elseif ($dis = '06') {
        $dis2 = 'Emotional/Behavioural Difficulties';
    } elseif ($dis = '07') {
        $dis2 = 'Mental Health Difficulty';
    } elseif ($dis = '8') {
        $dis2 = 'Temporary Disability After Illness (For Example Post-Viral) Or Accident';
    } elseif ($dis = '09') {
        $dis2 = 'Profound Complex Disabilities	';
    } elseif ($dis = '10') {
        $dis2 = 'Aspergers Syndrome';
    } elseif ($dis = '90') {
        $dis2 = 'Multiple Disabilities';
    } elseif ($dis = '97') {
        $dis2 = 'Other';
    } elseif ($dis = '99') {
        $dis2 = 'Not known/information not provided';
    } elseif ($dis = '97') {
        $dis2 = 'Epilepsy, asthma, diabetes or other condition';
    } elseif ($dis = ' ') {
        $dis2 = 'Not known/information not provided';
    }
    return $dis2;
}

function learningdif ($ldiff2) {
    if ($ldiff = '01') {
        $ldiff2 = 'Moderate Learning Difficulty';
    } elseif ($ldiff = '2') {
        $ldiff2 = 'Severe Learning Difficulty';
    } elseif ($ldiff = '10') {
        $ldiff2 = 'Dyslexia';
    } elseif ($ldiff = '11') {
        $ldiff2 = 'Dyscalculia';
    } elseif ($ldiff = '19') {
        $ldiff2 = 'Other Specific Learning Difficulty';
    } elseif ($ldiff = '20') {
        $ldiff2 = 'Autism Spectrum Disorder';
    } elseif ($ldiff = '90') {
        $ldiff2 = 'Multiple Learning Difficulties';
    } elseif ($ldiff = '97') {
        $ldiff2 = 'Other';
    } elseif ($ldiff = '98') {
        $ldiff2 = 'No Learning Difficulty';
    } elseif ($ldiff = '99') {
        $ldiff2 = 'Not known/information not provided';
    }
    return $ldiff2;
}


// query to output student ID based on loginname
// connect to a DSN "myDSN"
// Find the logged on user and assign it to a string
$username = $user -> username;

//// the SQL statement that will query the database
//// select the yyul_login_id based on site login name
//// Uses the join statement to join together the two revelent tables
//$query = "SELECT * FROM dbo.YYULuserlookup JOIN dbo.studstudent ON dbo.YYULuserlookup.YYUL_Student_ID = dbo.studstudent.STUD_Student_ID where YYUL_Login_id='$username'";
//// perform the query
//  $result = odbc_exec($conn, $query);
//
//
//// print field name
//$colName = odbc_num_fields($result);
//for ($j = 1; $j <= $colName; $j++) {
//
//    echo odbc_field_name ($result, $j);
//
//}
//// fetch tha data from the database
//while (odbc_fetch_row($result)) {
//
//    for($i = 1;$i <= odbc_num_fields($result);$i++) {
//
//        echo odbc_result($result, $i);
//
//    }
//
//}
//
//
//// start the accordian menu
//accord_first('MIS Information');
//
//// Real query to pull data from MIS
//// connect to a DSN "mydb" with a user and password "marin"
//$connect = odbc_connect('s-corero2', 'sa', 'r3sult5!') ;
//if (!$connect)
//{exit("Connection failed for MIS: " .  $connect);}
////
//// query the users table for name and surname
////@FIXME link username to live data
////$query2 = "SELECT * FROM dbo.YYULuserlookup JOIN dbo.studstudent ON dbo.YYULuserlookup.YYUL_Student_ID = dbo.studstudent.STUD_Student_ID where YYUL_Login_id='STC13808'";
//// $query = "SELECT * FROM dbo.YYULuserlookup";
//// perform the query
//$result2 = odbc_exec($connect, $query2);
// print_r ($result2);
//// fetch the data and print out details based on column numbers
//// fetch the data from the database
//while (odbc_fetch_row($result2)) {
//    $title = odbc_result($result2, 14);
//    $name = odbc_result($result2, 8);
//    $surname = odbc_result($result2, 9);
//    $id = odbc_result($result2, 5);
//    $dob = odbc_result($result2, 12);
//    $gender = odbc_result($result2, 13);
//    $eth = odbc_result($result2, 15);
//    $ldiff = odbc_result($result2, 17);
//    $disability = odbc_result($result2, 16);
//    $nationality = odbc_result($result2, 31);
//    // $photo = odbc_result($result2, 30);
//    $dob = fixdob($dob);
//    $gender = fixgender($gender);
//    $ethnicity = ethnicity($eth);
//    $disability = disability($dis);
//    $learningdif = learningdif ($ldiff);
//echo 'test';
//    print("Students name is $title $name $surname<br />");
//    print("Students ID number is $id<br />");
//    print("Students DOB is $dob<br />");
//    print("Students Gender is $gender<br />");
//    print("students ethnicity is $ethnicity<br />");
//    print("student has $learningdif<br />");
//    print("student has $disability<br />");
//    print("student is $nationality<br />");
////    echo 'opps something went wrong<br/>';
////    echo 'hardcoded stuff follows<br/>';
////    echo 'Name: test<br/>';
////    echo 'DOB: 12/12/02<br/>';
////    echo 'Ethnicity: other';
//    // print("student pic $photo<br />");
//
//}
//
//
//
//
//// Profiler information section ***
//accord_last();

accord_first('Profiler Information');

// create profiler connection
$connectpro = odbc_connect('s-profiler', 'sa', 'r3sult5');
// echo $id;
// $querypro = "SELECT * FROM dbo.users WHERE EnrolmentNo='$id'";
// $select = "SELECT * FROM dbo.users ";
// $join = "JOIN dbo.userbaseline ON dbo.users.ID = dbo.usersbaseline.userid ";
// $where = "WHERE EnrolmentNo='$userid'";
// $querypro = "$select $join $where";
// query to slect and join the relevent profiler tables
$querypro = "SELECT * FROM dbo.users JOIN dbo.usersbaseline ON dbo.users.ID = dbo.usersbaseline.userid where userid='382861342'";
// $querypro = "SELECT * FROM dbo.users  WHERE EnrolmentNo='$id'";
// perform the query
$resultpro = odbc_exec($connectpro, $querypro);

while (odbc_fetch_row($resultpro)) {
    $namepro = odbc_result($resultpro, 7);
    $surnamepro = odbc_result($resultpro, 8);
    $enrolmentstatus = odbc_result($resultpro, 14);
    $idpro = odbc_result($resultpro, 1);
    $indlevelnum = odbc_result($resultpro, 94);
    $indlevelcom = odbc_result($resultpro, 98);
    $lastresultnum = odbc_result($resultpro, 93);
    $lastresultcom = odbc_result($resultpro, 99);
    $TargetDiagLevelCom = odbc_result($resultpro, 208);
    $TargetDiagLevelNum = odbc_result($resultpro, 209);
    $TargetDiagLevelICT = odbc_result($resultpro, 210);
    $Numofretests = odbc_result($resultpro, 172);
    $Numofretestscomms = odbc_result($resultpro, 188);
    $numsd1 = odbc_result($resultpro, 161);
    $numsr1 = odbc_result($resultpro, 162);
    $numsr2 = odbc_result($resultpro, 163);
    $commsd1 = odbc_result($resultpro, 177);
    $commsr1 = odbc_result($resultpro, 178);
    $commsr2 = odbc_result($resultpro, 179);
    $ictd1 = odbc_result($resultpro, 193);
    $ict21 = odbc_result($resultpro, 194);
    $ictr2 = odbc_result($resultpro, 195);

    echo "students profiler ID is $idpro<br />";
    echo "Students name is $namepro<br />";
    echo "Enrolment status is $enrolmentstatus<br />";
    print("Profile name is $namepro $surnamepro<br />");
    echo 'Assesment Levels<br />';
    echo "Students Indlevelnum is - $indlevelnum<br />";
    echo "Students lastresultnum is - $lastresultnum<br />";
    echo "Students Indlevelcom is - $indlevelcom<br />";
    echo "Students lastresultcom is - $lastresultcom<br />";
    echo "Students TargetDiagLevelCom is - $TargetDiagLevelCom<br />";
    echo "Next comms test is - $Numofretestscomms<br />";
    echo "Students TargetDiagLevelNum is - $TargetDiagLevelNum<br />";
    echo "Next number test - $Numofretests<br />";
    echo "Students TargetDiagLevelICT is - $TargetDiagLevelICT<br />";
    echo "Nums D1 is $numsd1<br />";
    echo "Nums R1 is $numsr1<br />";
    echo "Nums R2 is $numsr2<br />";
    echo "Comms D1 is $commsd1<br />";
    echo "Comms R1 is $commsr1<br />";
    echo "Comms R2 is $commsr2<br />";
    echo "ICT D1 is $ictd1<br />";
    echo "ICT R1 is $ictr1<br />";
    echo "ICT R2 is $ict21r2<br />";
}

// close the connection
odbc_close ($connectpro);
odbc_close ($connect);
odbc_close ($conn);



// CAST information section ***
accord_last();
//accord_first('CAST Information');
//
//$db_host = '10.0.100.92';
//$db_user = 'root';
//$db_pwd = '88boom';
//$database = 'drupal';
//
//$connection = mysql_connect($db_host, $db_user, $db_pwd) or die ("Unable to connect!");
//mysql_select_db($database) or die ("Unable to select database!");
//
//$query = "select * from node node JOIN users users ON node.uid = users.uid
//left join profile_values pv on pv.uid = users.uid
//left join profile_fields pf on pf.fid = pv.fid
//left join content_type_ilp cti on cti.vid = node.vid
//left join content_field_student_target_status cfsts on cfsts.vid = cti.vid
//left join  content_type_cast_profile cp on cp.vid = node.vid
//where (users.uid = 2)";
//
////echo $query;
//
//$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
////echo '<br />the result <br />';
////printf($result);
//
//
//while($row = mysql_fetch_array($result)) {
//    if ($row['59'] != null) {
//        echo "Disability support needs: {$row['59']}<br />";
//    }
//    if ($row['60'] != null) {
//        echo "Other disability: {$row['60']}<br />";
//    }
//    if ($row['61'] != null) {
//        echo "Learning difficulty: {$row['61']}<br />";
//    }
//    if ($row['62'] != null) {
//        echo "Other Learning Difficulty: {$row['62']}<br />";
//    }
//    if ($row['63'] != null) {
//        echo "Student would like: {$row['63']}<br />";
//    }
//    if ($row['64'] != null) {
//        echo "Student needs: {$row['64']}<br />";
//    }
//    if ($row['65'] != null) {
//        echo "Exam concessions: {$row['65']}<br />";
//    }
//    if ($row['66'] != null) {
//        echo "Equipment Resources: {$row['66']}<br />";
//    }
//    if ($row['67'] != null) {
//        echo "History of need: {$row['67']}<br />";
//    }
//    if ($row['68'] != null) {
//        echo "History of provision: {$row['68']}<br />";
//    }
//
//    //Wrat test loop
//    if ($row['69'] != null) {
//        echo "Date of WRAT test: {$row['69']}<br />";
//        echo "WRAT green or blue: {$row['70']}<br />";
//        echo "Percentage Unrecognisable: {$row['71']}<br />";
//    } else {
//        echo 'No WRAT test taken';
//    }
//}
//
//
//while($row = mysql_fetch_array($result)) {
//    if ($row['69'] != null) {
//        echo "Date of WRAT test: {$row['69']}<br />";
//    }
//}
//
//accord_last();



?>

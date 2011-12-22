<?php

// begin custom template *******
function fixdob2($realdob2) {
    // reformat date of birth
    //  echo 'realdob is: ' . $realdob2;
    $dob2 = $realdob2;

    // convet the date to unix timestamp
    $unixtime = strtotime($dob2);
    // echo "unix time is $unixtime";
    // convert the timestamp to a properdate
    $realdob2 = date('d M Y', $unixtime);
    // echo "Realdob is $realdob";
    // echo '<br />';
    return $realdob2;
}

 $learnerquery = "SELECT     STUDstudent.STUD_Student_ID AS LearnerID, STYRstudentYR.STYR_Year AS Year, RTRIM(RTRIM(TutorName.PERS_Forename)
                      + ' ' + TutorName.PERS_Forename_2) + ' ' + TutorName.PERS_Surname AS TutorName, PriorInstitution.CMPN_Company_Name AS PriorInstitution,
                      Employer.CMPN_Company_Name AS EmployerName,
                      CASE WHEN STUD_Gender = 'f' THEN 'Female' WHEN STUD_Gender = 'm' THEN 'Male' ELSE 'Unknown' END AS Gender,
                      STUDstudent.STUD_EMail_Address AS EmailAddress, STUDstudent.STUD_Known_As AS known_as, STUDstudent.STUD_Mobile_Telephone AS MobilePhone,
                      STUDstudent.STUD_Home_Telephone_No AS HomePhone, STUDstudent.STUD_Daytime_Telephone AS DaytimePhone,
                      STUDstudent.STUD_DOB AS DOB, [Learner Learning Difficulty or Health Problem].GNCD_Description AS LLDHP,
                      Disability.GNCD_Description AS Disability, EmergencyContact.EmergencyName, EmergencyContact.SCON_Home_Phone AS Emergency_Home_No,
                      EmergencyContact.SCON_Daytime_Phone, EmergencyContact.SCON_Mobile_Phone AS Emergency_Mobile_No,
                      EmergencyContact.SCON_Relation_to_Student AS EMRRelationshiptoLearner, STYRstudentYR.STYR_Add_Supp_Cost AS AdditionalSupportCost,
                      PriorAttainment.GNCD_Description AS PriorAttainmentLevel, Address.GNAM_Address1, Address.GNAM_Address2, Address.GNAM_Address3,
                      Address.GNAM_Address4, Address.GNAM_Address5, Address.GNAM_Country, Address.GNAM_PostCode, GNALAddressLinks.GNAL_AddressType,
                      GNALAddressLinks.GNAL_ToDate, EMALearners.EMAL_EMA_Number, EMALearners.EMAL_ALG_Reference,
                      STYRstudentYR.STYR_Age_end_Aug AS Age, STYRstudentYR.STYR_Drop_Out_Date AS LeftCollege, DisadvantageUplift.GNCD_Description AS DU,
                      RestrictedUseIndicator.GNCD_Description AS RestUse, AdditionalSupport.GNCD_Description AS AddSupp,
                      LearnerStatus.GNCD_Description AS StudentStatus, CountryOfDomicile.GNCD_Description AS CoD, Ethnicity.GNCD_Description AS Ethnicity,
                      Nationality.GNCD_Description AS Nationality, Difficulty.GNCD_Description AS Difficulty, NINumber.NINumber, ULN.ULN,
                      RTRIM(STUDstudent.STUD_Title) AS Title, RTRIM(STUDstudent.STUD_Forename_1) + ' ' + RTRIM(STUDstudent.STUD_Surname) AS LearnerName,
                      CASE WHEN STUD_Photo_filename = ' ' THEN 'Nophoto.jpg' ELSE Rtrim(STUD_Photo_filename) END AS Photo, University.[University Number]
FROM         (SELECT     GNCD_Description, GNCD_General_Code
                       FROM          GNCDgncodes AS GNCDgncodes_2
                       WHERE      (GNCD_Code_Type = 'SD')) AS [Learner Learning Difficulty or Health Problem] RIGHT OUTER JOIN
                      STUDstudent INNER JOIN
                      STYRstudentYR ON STYRstudentYR.STYR_Student_ID = STUDstudent.STUD_Student_ID INNER JOIN
                      GNAMAddressMain AS Address INNER JOIN
                      GNALAddressLinks ON Address.GNAM_ISN = GNALAddressLinks.GNAL_GNAM_ISN ON
                      STUDstudent.STUD_Student_ID = GNALAddressLinks.GNAL_EntityRef LEFT OUTER JOIN
                          (SELECT     STAN_Student_ID AS LearnerID, RTRIM(STAN_Alternative_ID) AS [University Number], STAN_Alias_Type
                            FROM          STANaltno AS STANaltno_2
                            GROUP BY STAN_Student_ID, RTRIM(STAN_Alternative_ID), STAN_Alias_Type
                            HAVING      (RTRIM(STAN_Alternative_ID) <> ' ') AND (STAN_Alias_Type = 'UC8')) AS University ON
                      STUDstudent.STUD_Student_ID = University.LearnerID LEFT OUTER JOIN
                          (SELECT     STAN_Student_ID AS LearnerID, RTRIM(STAN_Alternative_ID) AS NINumber
                            FROM          STANaltno
                            WHERE      (STAN_Alias_Type = 'NIN')
                            GROUP BY STAN_Student_ID, RTRIM(STAN_Alternative_ID)
                            HAVING      (RTRIM(STAN_Alternative_ID) <> ' ')) AS NINumber ON STUDstudent.STUD_Student_ID = NINumber.LearnerID LEFT OUTER JOIN
                          (SELECT     STAN_Student_ID AS LearnerID, RTRIM(STAN_Alternative_ID) AS ULN
                            FROM          STANaltno AS STANaltno_1
                            WHERE      (STAN_Alias_Type = 'ULN')
                            GROUP BY STAN_Student_ID, RTRIM(STAN_Alternative_ID)
                            HAVING      (RTRIM(STAN_Alternative_ID) <> ' ')) AS ULN ON STUDstudent.STUD_Student_ID = ULN.LearnerID LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_10
                            WHERE      (GNCD_Code_Type = 'LD')) AS Difficulty ON STYRstudentYR.STYR_Learning_Difficulty = Difficulty.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_11
                            WHERE      (GNCD_Code_Type = 'DB')) AS Disability ON STYRstudentYR.STYR_Disability = Disability.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_1
                            WHERE      (GNCD_Code_Type = 'LPA')) AS PriorAttainment ON STYRstudentYR.STYR_Prior_Attain_Lvl = PriorAttainment.GNCD_General_Code ON
                      [Learner Learning Difficulty or Health Problem].GNCD_General_Code = STYRstudentYR.STYR_LDDHP LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_3
                            WHERE      (GNCD_Code_Type = 'NA')) AS Nationality ON STUDstudent.STUD_Nationality = Nationality.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_5
                            WHERE      (GNCD_Code_Type = 'EH')) AS Ethnicity ON STUDstudent.STUD_Ethnicity = Ethnicity.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_6
                            WHERE      (GNCD_Code_Type = 'COD')) AS CountryOfDomicile ON
                      STYRstudentYR.STYR_COD = CountryOfDomicile.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_8
                            WHERE      (GNCD_Code_Type = 'SY')) AS LearnerStatus ON
                      STYRstudentYR.STYR_Student_Status = LearnerStatus.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_9
                            WHERE      (GNCD_Code_Type = 'LAS')) AS AdditionalSupport ON
                      STYRstudentYR.STYR_Adnl_Supp_Asses = AdditionalSupport.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_7
                            WHERE      (GNCD_Code_Type = 'LRU')) AS RestrictedUseIndicator ON
                      STUDstudent.STUD_Rest_Use = RestrictedUseIndicator.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes
                            WHERE      (GNCD_Code_Type = 'UP')) AS DisadvantageUplift ON
                      STYRstudentYR.STYR_DU_Category = DisadvantageUplift.GNCD_General_Code LEFT OUTER JOIN
                      EMALearners ON STYRstudentYR.STYR_Year = EMALearners.EMAL_Year AND
                      STYRstudentYR.STYR_Student_ID = EMALearners.EMAL_Student_ID LEFT OUTER JOIN
                      CMPN_Company_main AS PriorInstitution ON STUDstudent.STUD_School_ISN = PriorInstitution.CMPN_ISN LEFT OUTER JOIN
                      CMPN_Company_main AS Employer ON STUDstudent.STUD_Employer_Code = Employer.CMPN_Company_Code LEFT OUTER JOIN
                      PERSstaff AS TutorName ON STYRstudentYR.STYR_Personal_Tutor = TutorName.PERS_Staff_Code LEFT OUTER JOIN
                      PERSstaff AS Staff ON STYRstudentYR.STYR_Senior_Tutor_ISN = Staff.PERS_ISN LEFT OUTER JOIN
                          (SELECT     SCON_Student_ID, LTRIM(RTRIM(SCON_Title) + ' ' + RTRIM(SCON_Forename1) + ' ' + RTRIM(SCON_Surname)) AS EmergencyName,
                                                   SCON_Home_Phone, SCON_Mobile_Phone, SCON_Daytime_Phone, SCON_Relation_to_Student
                            FROM          SCONContacts
                            WHERE      (SCON_Deceased = 0) AND (SCON_Primary_Emergency = 1)) AS EmergencyContact ON
                      STUDstudent.STUD_Student_ID = EmergencyContact.SCON_Student_ID
WHERE    (STUDstudent.STUD_Student_ID = '" . $student_number . "') AND STYRstudentYR.STYR_Year ='" . $academicyear . "' AND
                      (GNALAddressLinks.GNAL_AddressType = 'Home') AND (GNALAddressLinks.GNAL_ToDate IS NULL)";


$odd =  ' style="background-color: rgb(220, 241, 249);"';
$even = ' style="background-color: rgb(252, 254, 222);"';


//echo $learnerquery;

$learnerresult = mssql_query($learnerquery);

//print_r($learnerresult);
//echo 'Qualifications<br/>';
// loop thorugh the returned rows and print the results

$number_of_rows = mssql_num_rows($learnerresult);

if ($number_of_rows >= 2 ) {
    echo  'error with mis database multiple rows returned<br>';
    echo 'number of rows is: ' . $number_of_rows;
}


if ($number_of_rows >= 1) {
    while ($row = mssql_fetch_assoc($learnerresult)) {

        $studentphoto = $row['Photo'];
       accord_first('Learner Details');

echo '<table class="plp">';
        echo '<tr' . $odd . '><th>Learner ID: </th><td>' . $row['LearnerID'] . '</td></tr>';
        
        echo '<tr' . $even . '><th>Known as: </th><td>' . $row['known_as'] . '</td></tr>';
       echo '<tr' . $odd . '><th>Name: </th><td>' . $row['Title'] . ' ' . $row['LearnerName'] . '</td></tr>';
        $learnername = $row['Title'] . ' ' . $row['LearnerName'];
        echo '<tr' . $even . '><th>Year: </th><td>' . $row['Year'] . '</td></tr>';
       echo '<tr' . $odd . '><th>Tutor Name: </th><td>' . $row['TutorName'] . '</td></tr>';
        echo '<tr' . $even . '><th>Prior Institution: </th><td>' . $row['PriorInstitution'] . '</td></tr>';
        echo '<tr' . $odd . '><th>Employer Name: </th><td>' . $row['EmployerName'] . '</td></tr>';
        echo '<tr' . $even . '><th>Gender: </th><td>' . $row['Gender'] . '</td></tr>';
        echo '<tr' . $odd . '><th>Ethnicity: </th><td>' . $row['Ethnicity'] . '</td></tr>';
        echo '<tr' . $even . '><th>Nationality: </th><td>' . $row['Nationality'] . '</td></tr>';
//call and fix the date of birth
        $dob = $row['DOB'];
        $dob = fixdob2($dob);
        

//query get age
        $querygetage;

        echo '<tr' . $odd . '><th>DOB: </th><td>' . $dob . '</td></tr>';
        $age = $row['Age'];
       echo '<tr' . $even . '><th>Age at end of Aug: </th><td>' . $age . '</td></tr>';
echo '</table>';
        accord_last();
        accord_first("Contact Details");
        echo '<table>';
        echo '<tr' . $even . '><th>Email: </th><td>' . $row['EmailAddress'] . '</td></tr>';
        echo '<tr' . $odd . '><th>Mobile Tel: </th><td>' . $row['MobilePhone'] . '</td></tr>';
       echo '<tr' . $even . '><th>Home Phone: </th><td>' . $row['HomePhone'] . '</td></tr>';
         echo '<tr' . $odd . '><th>Daytime Phone: </th><td>' . $row['DaytimePhone'] . '</td></tr>';
        echo '<tr' . $even . '><th>Emergency Contact: </th><td>' . $row['EmergencyName'] . '</td></tr>';
         echo '<tr' . $odd . '><th>Emergency Home Tel: </th><td>' . $row['Emergency_Home_No'] . '</td></tr>';
        echo '<tr' . $even . '><th>SCON Daytime Number: </th><td>' . $row['SCON_Daytime_Phone'] . '</td></tr>';
         echo '<tr' . $odd . '><th>Emergency Mobile: </th><td>' . $row['Emergency_Mobile_No'] . '</td></tr>';
       echo '<tr' . $even . '><th>EMR Relationship to Learner: </th><td>' . $row['EMRRelationshiptoLearner'] . '</td></tr>';
        echo '<tr' . $odd . '><th>Proir Attainment Level: </th><td>' . $row['ProirAttainmentLevel'] . '</td></tr>';
       echo '<tr' . $even . '><th>Address 1: </th><td>' . $row['GNAM_Address1'] . '</td></tr>';
        echo '<tr' . $odd . '><th>Address 2: </th><td>' . $row['GNAM_Address2'] . '</td></tr>';
        echo '<tr' . $even . '><th>Address 3: </th><td>' . $row['GNAM_Address3'] . '</td></tr>';
        echo '<tr' . $odd . '><th>Address 4: </th><td>' . $row['GNAM_Address4'] . '</td></tr>';
       echo '<tr' . $even . '><th>Address 5: </th><td>' . $row['GNAM_Address5'] . '</td></tr>';
       echo '<tr' . $odd . '><th>Country: </th><td>' . $row['GNAM_Country'] . '</td></tr>';
       echo '<tr' . $even . '><th>Postcode: </th><td>' . $row['GNAM_PostCode'] . '</td></tr>';
        echo '<tr' . $odd . '><th>GNAL to Date: </th><td>' . $row['GNAL_ToDate'] . '</td></tr>';
       echo '<tr' . $even . '><th>EMAL EMA Number: </th><td>' . $row['EMAL_EMA_Number'] . '</td></tr>';
        echo '<tr' . $odd . '><th>EMAL ALG Ref: </th><td>' . $row['EMAL_ALG_Reference'] . '</td></tr>';
       echo '<tr' . $even . '><th>Left College: </th><td>' . $row['LeftCollege'] . '</td></tr>';
         //Field removed as some students found it upsetting
       // echo 'DU: ' . $row['DU'] . '<br/>';
        echo '<tr' . $odd . '><th>Rest Use: </th><td>' . $row['Rest Use'] . '</td></tr>';
       echo '<tr' . $even . '><th>Student Status: </th><td>' . $row['StudentStatus'] . '</td></tr>';
        echo '<tr' . $odd . '><th>CoD: </th><td>' . $row['CoD'] . '</td></tr>';
echo '</table>';
        accord_last();

       accord_first("Other");
       echo '<table>';
        echo '<tr' . $odd . '><th>NI Number: </th><td>' . $row['NINumber'] . '</td></tr>';
        echo '<tr' . $even . '><th>ULN: </th><td>' . $row['ULN'] . '</td></tr>';
        echo '<tr' . $odd . '><th>University Number: </th><td>' . $row['University Number'] . '</td></tr>';
        echo '<tr' . $even . '><th>LLDHP: </th><td>' . $row['LLDHP'] . '</td></tr>';
        echo '</table>';
        accord_last();
    }
} else {
    echo "No MIS records found for user " . $CFG->name;
    echo " either the there is a problem with MIS or more likely the Student isn't enrolled for this year";
    echo '<br/>Please wait a few moments and refresh the page';

    //@FIXME run and horrbly long statement to set the users photo
    $queryphoto ="SELECT     STUDstudent.STUD_Student_ID AS LearnerID, STYRstudentYR.STYR_Year AS Year, RTRIM(RTRIM(TutorName.PERS_Forename)
                      + ' ' + TutorName.PERS_Forename_2) + ' ' + TutorName.PERS_Surname AS TutorName, PriorInstitution.CMPN_Company_Name AS PriorInstitution,
                      Employer.CMPN_Company_Name AS EmployerName,
                      CASE WHEN STUD_Gender = 'f' THEN 'Female' WHEN STUD_Gender = 'm' THEN 'Male' ELSE 'Unknown' END AS Gender,
                      STUDstudent.STUD_EMail_Address AS EmailAddress, STUDstudent.STUD_Mobile_Telephone AS MobilePhone,
                      STUDstudent.STUD_Home_Telephone_No AS HomePhone, STUDstudent.STUD_Daytime_Telephone AS DaytimePhone,
                      STUDstudent.STUD_DOB AS DOB, [Learner Learning Difficulty or Health Problem].GNCD_Description AS LLDHP,
                      Disability.GNCD_Description AS Disability, EmergencyContact.EmergencyName, EmergencyContact.SCON_Home_Phone AS Emergency_Home_No,
                      EmergencyContact.SCON_Daytime_Phone, EmergencyContact.SCON_Mobile_Phone AS Emergency_Mobile_No,
                      EmergencyContact.SCON_Relation_to_Student AS EMRRelationshiptoLearner, STYRstudentYR.STYR_Add_Supp_Cost AS AdditionalSupportCost,
                      PriorAttainment.GNCD_Description AS PriorAttainmentLevel, Address.GNAM_Address1, Address.GNAM_Address2, Address.GNAM_Address3,
                      Address.GNAM_Address4, Address.GNAM_Address5, Address.GNAM_Country, Address.GNAM_PostCode, GNALAddressLinks.GNAL_AddressType,
                      GNALAddressLinks.GNAL_ToDate, EMALearners.EMAL_EMA_Number, EMALearners.EMAL_ALG_Reference,
                      STYRstudentYR.STYR_Drop_Out_Date AS LeftCollege, DisadvantageUplift.GNCD_Description AS DU,
                      RestrictedUseIndicator.GNCD_Description AS RestUse, AdditionalSupport.GNCD_Description AS AddSupp,
                      LearnerStatus.GNCD_Description AS StudentStatus, CountryOfDomicile.GNCD_Description AS CoD, Ethnicity.GNCD_Description AS Ethnicity,
                      Nationality.GNCD_Description AS Nationality, Difficulty.GNCD_Description AS Difficulty, NINumber.NINumber, ULN.ULN,
                      RTRIM(STUDstudent.STUD_Title) AS Title, RTRIM(STUDstudent.STUD_Forename_1) + ' ' + RTRIM(STUDstudent.STUD_Surname) AS LearnerName,
                      CASE WHEN STUD_Photo_filename = ' ' THEN 'Nophoto.jpg' ELSE Rtrim(STUD_Photo_filename) END AS Photo, University.[University Number]
FROM         (SELECT     GNCD_Description, GNCD_General_Code
                       FROM          GNCDgncodes AS GNCDgncodes_2
                       WHERE      (GNCD_Code_Type = 'SD')) AS [Learner Learning Difficulty or Health Problem] RIGHT OUTER JOIN
                      STUDstudent INNER JOIN
                      STYRstudentYR ON STYRstudentYR.STYR_Student_ID = STUDstudent.STUD_Student_ID INNER JOIN
                      GNAMAddressMain AS Address INNER JOIN
                      GNALAddressLinks ON Address.GNAM_ISN = GNALAddressLinks.GNAL_GNAM_ISN ON
                      STUDstudent.STUD_Student_ID = GNALAddressLinks.GNAL_EntityRef LEFT OUTER JOIN
                          (SELECT     STAN_Student_ID AS LearnerID, RTRIM(STAN_Alternative_ID) AS [University Number], STAN_Alias_Type
                            FROM          STANaltno AS STANaltno_2
                            GROUP BY STAN_Student_ID, RTRIM(STAN_Alternative_ID), STAN_Alias_Type
                            HAVING      (RTRIM(STAN_Alternative_ID) <> ' ') AND (STAN_Alias_Type = 'UC8')) AS University ON
                      STUDstudent.STUD_Student_ID = University.LearnerID LEFT OUTER JOIN
                          (SELECT     STAN_Student_ID AS LearnerID, RTRIM(STAN_Alternative_ID) AS NINumber
                            FROM          STANaltno
                            WHERE      (STAN_Alias_Type = 'NIN')
                            GROUP BY STAN_Student_ID, RTRIM(STAN_Alternative_ID)
                            HAVING      (RTRIM(STAN_Alternative_ID) <> ' ')) AS NINumber ON STUDstudent.STUD_Student_ID = NINumber.LearnerID LEFT OUTER JOIN
                          (SELECT     STAN_Student_ID AS LearnerID, RTRIM(STAN_Alternative_ID) AS ULN
                            FROM          STANaltno AS STANaltno_1
                            WHERE      (STAN_Alias_Type = 'ULN')
                            GROUP BY STAN_Student_ID, RTRIM(STAN_Alternative_ID)
                            HAVING      (RTRIM(STAN_Alternative_ID) <> ' ')) AS ULN ON STUDstudent.STUD_Student_ID = ULN.LearnerID LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_10
                            WHERE      (GNCD_Code_Type = 'LD')) AS Difficulty ON STYRstudentYR.STYR_Learning_Difficulty = Difficulty.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_11
                            WHERE      (GNCD_Code_Type = 'DB')) AS Disability ON STYRstudentYR.STYR_Disability = Disability.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_1
                            WHERE      (GNCD_Code_Type = 'LPA')) AS PriorAttainment ON STYRstudentYR.STYR_Prior_Attain_Lvl = PriorAttainment.GNCD_General_Code ON
                      [Learner Learning Difficulty or Health Problem].GNCD_General_Code = STYRstudentYR.STYR_LDDHP LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_3
                            WHERE      (GNCD_Code_Type = 'NA')) AS Nationality ON STUDstudent.STUD_Nationality = Nationality.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_5
                            WHERE      (GNCD_Code_Type = 'EH')) AS Ethnicity ON STUDstudent.STUD_Ethnicity = Ethnicity.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_6
                            WHERE      (GNCD_Code_Type = 'COD')) AS CountryOfDomicile ON
                      STYRstudentYR.STYR_COD = CountryOfDomicile.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_8
                            WHERE      (GNCD_Code_Type = 'SY')) AS LearnerStatus ON
                      STYRstudentYR.STYR_Student_Status = LearnerStatus.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_9
                            WHERE      (GNCD_Code_Type = 'LAS')) AS AdditionalSupport ON
                      STYRstudentYR.STYR_Adnl_Supp_Asses = AdditionalSupport.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes AS GNCDgncodes_7
                            WHERE      (GNCD_Code_Type = 'LRU')) AS RestrictedUseIndicator ON
                      STUDstudent.STUD_Rest_Use = RestrictedUseIndicator.GNCD_General_Code LEFT OUTER JOIN
                          (SELECT     GNCD_Description, GNCD_General_Code
                            FROM          GNCDgncodes
                            WHERE      (GNCD_Code_Type = 'UP')) AS DisadvantageUplift ON
                      STYRstudentYR.STYR_DU_Category = DisadvantageUplift.GNCD_General_Code LEFT OUTER JOIN
                      EMALearners ON STYRstudentYR.STYR_Year = EMALearners.EMAL_Year AND
                      STYRstudentYR.STYR_Student_ID = EMALearners.EMAL_Student_ID LEFT OUTER JOIN
                      CMPN_Company_main AS PriorInstitution ON STUDstudent.STUD_School_ISN = PriorInstitution.CMPN_ISN LEFT OUTER JOIN
                      CMPN_Company_main AS Employer ON STUDstudent.STUD_Employer_Code = Employer.CMPN_Company_Code LEFT OUTER JOIN
                      PERSstaff AS TutorName ON STYRstudentYR.STYR_Personal_Tutor = TutorName.PERS_Staff_Code LEFT OUTER JOIN
                      PERSstaff AS Staff ON STYRstudentYR.STYR_Senior_Tutor_ISN = Staff.PERS_ISN LEFT OUTER JOIN
                          (SELECT     SCON_Student_ID, LTRIM(RTRIM(SCON_Title) + ' ' + RTRIM(SCON_Forename1) + ' ' + RTRIM(SCON_Surname)) AS EmergencyName,
                                                   SCON_Home_Phone, SCON_Mobile_Phone, SCON_Daytime_Phone, SCON_Relation_to_Student
                            FROM          SCONContacts
                            WHERE      (SCON_Deceased = 0) AND (SCON_Primary_Emergency = 1)) AS EmergencyContact ON
                      STUDstudent.STUD_Student_ID = EmergencyContact.SCON_Student_ID
WHERE    (STUDstudent.STUD_Student_ID = '" . $student_number . "') AND
                      (GNALAddressLinks.GNAL_AddressType = 'Home') AND (GNALAddressLinks.GNAL_ToDate IS NULL)";

    
$learnerresult2 = mssql_query($queryphoto);


$number_of_rows2 = mssql_num_rows($learnerresult2);

if ($number_of_rows2 >= 1) {
    while ($row2 = mssql_fetch_assoc($learnerresult2)) {
         $studentphoto = $row2['Photo'];
    }
}
}





?>

<?php
/* 
 * Get the students faculty
 */

    $query = "Select distinct stud_student_id, stud_surname, stud_forename_1, stud_title, pr.PRPH_ML3
from studstudent as stu join sten on stu.STUD_Student_ID=sten.STEN_Student_ID
join PRPHProvisionHeader pr on sten.sten_Provision_Code=pr.PRPH_Code
INNER JOIN ACYR ON STEN.STEN_Year = ACYR.ACYR_College_Year
WHERE (STEN.STEN_Completion_Stat = '1') AND (STEN.STEN_Outcome = '9') AND (ACYR.ACYR_ENR_PY_CY_NY = 'CY') AND stud_student_id = '" . $student_number . "'";

    $result = mssql_query($query);

    while ($row = mssql_fetch_array($result)) {
        $studentFaculty[] = $row;
    }



?>

<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//check if a not applicable flag has been set and if so don't show the parental block

// process the remove button

$query = "SELECT * FROM parental WHERE student_id='" . $student_number . "' AND not_applicable='1'";
//echo $query;
$result = $mysqli->query($query);

if ($result->num_rows == 0) {
    
//    try {
//        $parentalSigned = $client->getParentalById($student_number);
//    }
//
//    catch (SoapFault $e) {
//        // handle issues returned by the web service
//        echo '<br/>';
//        echo " No parental record found either the there is a problem with MIS or more likely the Student isn't enrolled for this year";
//        echo '<br/>Please wait a few moments and refresh the page';
//    }

$parentalSigned = $client->__soapCall("getParentalById",array($student_number));

    if ($parentalSigned['Signed'] == '0') {
        echo '<h2>Guardian/ Employer Agreement not signed <img src="./templates/custom/pix/delete-icon.png" width="32" height="32"/></h2>';
        echo '<a href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/Parent_Carer_support_agreement_Revision_10.pdf" ><img src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/download_icon.png" width="32" height="32" > Download a copy of the parental agreement for signing</a><br/>';
        echo '<a href="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/Employer_contract.pdf" ><img src="' . $CFG->wwwroot . '/blocks/ilp/templates/custom/pix/download_icon.png" width="32" height="32" > Download a copy of the employer agreement for signing</a>';

               if (has_capability('block/ilp_student_info:viewclass', $context)) { ?>

<form method="post"
      action="/blocks/ilp/templates/custom/parental_process.php?student=<?php echo $student_number; ?>&stunum=<?php echo $studentid; ?>&courseid=<?php echo $courseid; ?>">
    <input type="hidden" id="studentnum" name="studentnum" value="<?php echo $student_number; ?>">

    <div id="parental">Click the red cross below if the Parental/ employer agreement isn't applicable for this student</p>
        <input id="removeParental" type="submit" name="removeParental" value="submit_change"/>
    </div>
</form>
<?php
}


    } elseif ($parentalSigned['Signed'] == 'yes') {
        //        echo 'yes';
        echo '<h2>Guardian/ Employer Agreement signed<img src="./templates/custom/pix/tick-icon.png" width="32" height="32" /></h2>';
    }

    ?>
</br>

<?php
}


?>

<!--Script to run the submit button graphic - doesn't work when added to the main js script files-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#removeParental').hover(function() {
            $(this).addClass('mhover')
        }, function() {
            $(this).removeClass('mhover');
        });
    });
</script>
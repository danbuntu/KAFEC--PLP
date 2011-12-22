<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 27/07/11
 * Time: 08:35
 * Shows the current students units and completeness level
 */

$notSet = 0;

// check the student_number isn't blank

if (!empty($student_number)) {
//    try {
//        $resultAssessment = $client->__soapCall("getAssessmentsById", array($student_number));
//    }
//
//    catch (SoapFault $e) {
//        // handle issues returned by the web service
//        echo "<br/>There has been a problem getting the assessments or the assessment tracker hasn't been set up for this course";
//        $notSet = 1;
//    }

    $resultAssessment = $client->__soapCall("getAssessmentsById",array($student_number));

if (empty($resultAssessment)) {
     $notSet = 1;
}


    if ($notSet != 1) {

        accord_first('Assessment Tracker');
        //print_r($resultAssessment);
        echo 'Hover for unit details and critieria';
        $count = 1;

        echo '<table><tr>';

        $unit = '';

        foreach ($resultAssessment as $key => $item) {

            if ($unit != $item->unitName) {
                $unit = $item->unitName;
                ?>

            <td><b>
                <div class="assessment">
                    <div class="assessmentbox<?php echo $item->unitColour; ?>">
                        <div class="assessmentboxtext"><?php echo substr($item->unitMark, 0, 1); ?></div>

                        <div class="assessmentbox"><img src="./templates/custom/pix/InfoIcon2.png"/>

                            <div class="assessmentinfo"><b>Unit
                                Description </b></p><?php echo $item->unitDescription; ?></p><b>Critieria on this
                                unit</b></p>
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mark</th>
                                    </tr>
                                    <?php
                                       foreach ($resultAssessment as $item) {

                                    if ($item->unitName == $unit) {

                                        echo '<tr><td>', $item->critName . '</td><td>', $item->critMark, '</td></tr>';
                                    }
                                }
                                    ?>
                                </table>

                            </div>
                        </div>
                    </div>

           <div class="hiddentext">_ </div> </td>
                                    <?php
 // Limit the assessment grid to 5 accross
                if ($count == 5) {
                    echo '</tr><tr>';
                    $count = 0;
                }
                $count++;
            }
        }
        ?>
    </tr></table>
    <?php

        unset($resultAssessment);

        accord_last();
    }
}
?>
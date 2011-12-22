<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 27/10/11
 * Time: 14:31
 * To change this template use File | Settings | File Templates.
 */
 

include('moodle_connection_mysqli.php');

$query = "SELECT bcomp, scomp, gcomp FROM passport WHERE learner_ref='" . $student_number . "'";
//echo $query;
$result = $mysqli->query($query);

//print_r($result);

echo '<h2>Employability Passport</h2>';

echo '<table ><tr style="text-align: center" cellspacing="6">';
while  ($row  = $result->fetch_object()) {

    if ($row->bcomp == 1) {
        echo '<th>';
        echo '<img src="/blocks/ilp/templates/custom/pix/Medal-Bronze-icon.png">';
        echo '<br/>Bronze achieved';
        echo '</th>';
    }
    if ($row->scomp == 1) {
echo '<th>';
        echo '<img src="/blocks/ilp/templates/custom/pix/Medal-Silver-icon.png">';
        echo '<br/>Silver achieved';
         echo '</th>';
    }
    if ($row->gcomp == 1) {
echo '<th>';
        echo '<img src="/blocks/ilp/templates/custom/pix/Medal-Gold-icon.png">';
        echo '<br/>Gold achieved';
         echo '</th>';
    }

}

echo '</tr></table>';



?>
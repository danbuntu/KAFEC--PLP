<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 16/06/11
 * Time: 14:02
 * Connects to the xmlservice server and pulls in the profiler data
 */

include('soap_connection.php');

accord_first('Profiler results');
//try {
//$result = $client->__soapCall("getProfilerById", array($student_number));
//}
//catch(SoapFault $e){
//  // handle issues returned by the web service
//    echo ' There has been a problem getting the profiler results';
//}

$result = $client->__soapCall("getProfilerById",array($student_number));

// echo the result for testing
//print_r($result);

foreach ($result as $item) {

    echo '<table style="text-align: center;">';
    
//    echo  '<tr class="darkblue"><th colspan="5">Baseliner Scores</th></tr>';
//    echo '<tr class="lightblue"><th>Numbers</th><td></td><th>Comms</th><td></td><th>ICT</th></tr>';
//    echo '<tr class="yellow"><td>' . $item->IndLevelNum . '</td><td></td><td>' . $item->IndLevelCom . '</td><td></td><td>' . $item->IndLevelICT . '</td></tr>';
//    echo '<tr class="yellow"><td>' . $item->DateCompletedNum . '</td><td></td><td>' . $item->DateCompletedCom . '</td><td></td><td>' . $item->DateCompletedICT . '</td></tr>';

    echo '<tr class="darkblue"><th colspan="7">English</th></tr>';
    echo '<tr class="lightblue"><th>Baseliner</th><th></th><th>DA</th><th></th><th>R1</th><th></th><th>R2</th></tr>';
    echo '<tr class="yellow"><td>' , $item['IndLevelCom'] , '</td><td>' . profilerCheckResults($item['CommsChange0']) , '</td><td>' , $item['CommsD1IndSubLevel'] , $item['CommsD1IndLevel'] , '</td><td>' , profilerCheckResults($item['CommsChange1']) , '</td><td>' , $item['CommsR1IndSubLevel'] , $item['CommsR1IndLevel'] , '</td><td>' , profilerCheckResults($item['CommsChange2']) , '</td><td>' , $item['CommsR2IndSubLevel'] , $item['CommsR2IndLevel'] , '</td></tr>';
    echo '<tr class="yellow"><td>' , $item['DateCompletedCom'] , '</td><td></td><td>' , $item['DateCompletedCommsD1'] , '</td><td></td><td>' , $item['DateCompletedCommsR1'] , '</td><td></td><td>' , $item['DateCompletedCommsR2'] , '</td></tr>';

    echo '<tr class="darkblue"><th colspan="7">Maths</th></tr>';
    echo '<tr class="lightblue"><th>Baseliner</th><th></th><th>DA</th><th></th><th>R1</th><th></th><th>R2</th></tr>';
    echo '<tr class="yellow"><td>' , $item['IndLevelNum'] , '</td><td>' , profilerCheckResults($item['NumChange0']) , '</td><td>' , $item['NumsD1IndSubLevel'] , $item['NumsD1IndLevel'] , '</td><td>' , profilerCheckResults($item['NumChange1']) , '</td><td>' , $item['NumsR1IndSubLevel'] , $item['NumsR1IndLevel'] , '</td><td>' , profilerCheckResults($item['NumChange2']) , '</td><td>' , $item['NumsR2IndSubLevel'] , $item['NumsR2IndLevel'] , '</td></tr>';
    echo '<tr class="yellow"><td>' , $item['DateCompletedNum'] , '</td><td></td><td>' , $item['DateCompletedNumsD1'] , '</td><td></td><td>' , $item['DateCompletedNumsR1'] , '</td><td></td><td>' , $item['DateCompletedNumsR2'] , '</td></tr>';

    echo '<tr class="darkblue"><th colspan="7">ICT</th></tr>';
    echo '<tr class="lightblue"><th>Baseliner</th><th></th><th>DA</th><th></th><th>R1</th><th></th><th>R2</th></tr>';
    echo '<tr class="yellow"><td>' , $item['IndLevelICT'] , '</td><td>' , profilerCheckResults($item['ICTChange0']) . '<td>' , $item['ICTD1IndSubLevel'] , $item['ICTD1IndLevel'] , '</td><td>' , profilerCheckResults($item['ICTChange1']) , '</td><td>' , $item['ICTR1IndSubLevel'] , $item['ICTR1IndLevel'] , '</td><td>' , profilerCheckResults($item['ICTChange2']) , '</td><td>' , $item['ICTR2IndSubLevel'] , $item['ICTR2IndLevel'] , '</td></tr>';
    echo '<tr class="yellow"><td>' , $item['DateCompletedICT'] . '</td><td></td><td>' , $item['DateCompletedICTD1'] , '</td><td></td><td>' , $item['DateCompletedICTR1'] , '</td><td></td><td>' , $item['DateCompletedICTR2'] , '</td></tr>';
    echo '</table>';

}
accord_last();

//Clear down
unset($result);


function profilerCheckResults($change)
{
    if ($change == 'increase') {
        $change = '<img src="./templates/custom/pix/go-up.png" height"20px" width="20px">';
    } elseif ($change == 'decrease') {
        $change = '<img src="./templates/custom/pix/go-down.png" height"20px" width="20px">';
    } elseif ($change == 'no change') {
        $change = '<img src="./templates/custom/pix/go-next.png" height"20px" width="20px">';
    } elseif ($change == 'none') {
        $change = '<img src="./templates/custom/pix/list-remove.png" height"20px" width="20px">';
    }
    return $change;
}

function checkIndLevel($level) {

    if ($level == ' ') {
        $value = 'n/a';
    }
    return $value;
}

?>
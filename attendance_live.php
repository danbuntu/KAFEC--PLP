<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 24/06/11
 * Time: 11:22
 * To change this template use File | Settings | File Templates.
 */

// Re-uses the $result att array that's already been set

print_r($resultAtt);

// get the size of the array
$size = count($resultAtt);

$size2 = $size - 1;

// Slice the array to remove the last element
$sliced = array_slice($resultAtt, 0, $size2);

//print_r($sliced);

accord_first('Total Attendance');
echo '<table>';

foreach ($sliced as $item) {

    echo '<tr class="darkblue"><th colspan="4">Course: ' . $item['Course_Title'] . '</th></tr>';
//    $presentdays = $row['Possible'] - $row['Present'];
    echo '<tr class="lightblue"><th>Possible</th><th>Present</th><th>Absent</th><th>Percentage</th></tr>';
    echo '<tr class="yellow"><td>' , $item['Possible'] , '</td>';
    echo '<td>' , $item['Actual'] , '</td>';
    echo '<td>' , $item['Absent'] , '</td>';
//    echo '<td>'. $item->attendancePercentage . '</td>';

    //call function loaded in attendance-headline.php
    $rv = attendancecolour($item['Percentage']);
    echo '<td><font color=' , $rv['0'] , '>' , $item['Percentage'] , '</font></td></tr>';

}
echo '</table>';
//print_r($lastArray);
// reuse $lastArray from attendnance_headline
echo '<b>Total possible lessons </b>' , $lastArray['Possible'] , '<br/>';
echo '<b>Total absent lessons </b>' , $lastArray['Absent'] , '<br/>';
$rv = attendancecolour($lastArray['Percentage']);
echo '<b>Total attendance is: </b><font color=' . $rv['0'] , '>' , $lastArray['Percentage'] , '</font>';

accord_last();

unset($resultarray);
unset($lastArray);
unset($sliced);
?>
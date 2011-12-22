<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 03/11/11
 * Time: 09:02
 * Get the exams soap service and print them
 */
?>

<script>
	$(function() {
		$("#accordion5").accordion({
            autoHeight: false,
			navigation: true
        });
	});
	</script>

    <?php
//
$client = new SoapClient(null, array(
             'location' => 'https://xmlservicesdev.midkent.ac.uk/restserver.php',
             'uri'      => 'urn://https:/xmlservicesdev.midkent.ac.uk/',
        'connection_timeout' => 120,
             'trace'    => 1 ));


try {
    $resultExam = $client->__soapCall("getExams", array($student_number));
} catch (SoapFault $E) {
    echo $E->faultstring;
}
//include ('accord_functions.php');




//var_dump($client->__getLastRequest());
//var_dump($client->__getLastResponse());
//
//print_r($resultExam);

?>
<DIV id=accordion5>
<H3><A href="#">Upcoming Timetabled Exams</A></H3>
<DIV>


<?php
foreach ($resultExam as $key => $item) {

    if ($key == 'Upcoming') {

        echo '<table>';
        echo '<tr class="darkblue"><th>Centre</th><th>Awarding Body</th><th>Subject Code</th><th>Subject Title</th><th>Paper Code</th><th>Paper Title</th><th>Start Time</th><th>End Time</th><th>Duration</th><th>Room</th><th>Candidate Number</th></tr>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {


            echo '<tr class="', $class, '">';
            foreach ($iItem as $iiKey => $iiItem) {

                echo '<td>', replaceUnderScore($iiItem), '</td>';

                // Switch the class to allow for stripping
                if ($class == 'lightblue') {
                    $class = 'yellow';
                } else {
                    $class = 'lightblue';
                }

            }
            echo '</tr>';
        }
        echo '</table>';
    }

}
?>
    </div>
<H3><A href="#">This Years Exams</A></H3>
<DIV>

<?php
foreach ($resultExam as $key => $item) {

    if ($key == 'ThisYears') {

        echo '<table>';
        echo '<tr class="darkblue"><th>Centre</th><th>Awarding Body</th><th>Subject Code</th><th>Subject Title</th><th>Paper Code</th><th>Paper Title</th><th>Start Time</th><th>End Time</th><th>Duration</th><th>Room</th><th>Candidate Number</th></tr>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {


            echo '<tr class="', $class, '">';
            foreach ($iItem as $iiKey => $iiItem) {

                echo '<td>', replaceUnderScore($iiItem), '</td>';

                // Switch the class to allow for stripping
                if ($class == 'lightblue') {
                    $class = 'yellow';
                } else {
                    $class = 'lightblue';
                }

            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>

</div>
   <H3><A href="#">Last Years Exams</A></H3>
<DIV>
<?php
foreach ($resultExam as $key => $item) {

    if ($key == 'LastYears') {

        echo '<table>';
        echo '<tr class="darkblue"><th>Centre</th><th>Awarding Body</th><th>Subject Code</th><th>Subject Title</th><th>Paper Code</th><th>Paper Title</th><th>Start Time</th><th>End Time</th><th>Duration</th><th>Room</th><th>Candidate Number</th></tr>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {


            echo '<tr class="', $class, '">';
            foreach ($iItem as $iiKey => $iiItem) {

                echo '<td>', replaceUnderScore($iiItem), '</td>';

                // Switch the class to allow for stripping
                if ($class == 'lightblue') {
                    $class = 'yellow';
                } else {
                    $class = 'lightblue';
                }

            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>
    </div>
    <H3><A href="#">Exams From 2 Years Ago</A></H3>
<DIV>
<?php
foreach ($resultExam as $key => $item) {

    if ($key == 'LastYears2') {

        echo '<table>';
        echo '<tr class="darkblue"><th>Centre</th><th>Awarding Body</th><th>Subject Code</th><th>Subject Title</th><th>Paper Code</th><th>Paper Title</th><th>Start Time</th><th>End Time</th><th>Duration</th><th>Room</th><th>Candidate Number</th></tr>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {


            echo '<tr class="', $class, '">';
            foreach ($iItem as $iiKey => $iiItem) {

                echo '<td>', replaceUnderScore($iiItem), '</td>';

                // Switch the class to allow for stripping
                if ($class == 'lightblue') {
                    $class = 'yellow';
                } else {
                    $class = 'lightblue';
                }

            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>
    </div>
    <H3><A href="#">Exams From 3 Years Ago</A></H3>
<DIV>
<?php

foreach ($resultExam as $key => $item) {

    if ($key == 'LastYears3') {

        echo '<table>';
        echo '<tr class="darkblue"><th>Centre</th><th>Awarding Body</th><th>Subject Code</th><th>Subject Title</th><th>Paper Code</th><th>Paper Title</th><th>Start Time</th><th>End Time</th><th>Duration</th><th>Room</th><th>Candidate Number</th></tr>';
        $class = 'lightblue';
        foreach ($item as $iKey => $iItem) {


            echo '<tr class="', $class, '">';
            foreach ($iItem as $iiKey => $iiItem) {

                echo '<td>', replaceUnderScore($iiItem), '</td>';

                // Switch the class to allow for stripping
                if ($class == 'lightblue') {
                    $class = 'yellow';
                } else {
                    $class = 'lightblue';
                }

            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
?>
    </div>
</div>
<?php
?>
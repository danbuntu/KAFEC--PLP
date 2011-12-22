<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<link rel='stylesheet' type='text/css' href='./fullcalendar/demos/redmond/theme.css' />
<link rel='stylesheet' type='text/css' href='fullcalendar.css' />
<script type='text/javascript' src='./fullcalendar/jquery/jquery-1.4.3.min.js'></script>
<script type='text/javascript' src='./fullcalendar/jquery/jquery-ui-1.8.5.custom.min.js'></script>
<script type='text/javascript' src='./fullcalendar/fullcalendar.js'></script>

<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    theme: true
    })

});
</script>


<div id='calendar'></div>
test

<?php
include('corero_conection.php');



$events = array();
//important ! $start = "2010-05-10T08:30";  iso8601 format !!
while ($row = mysql_fetch_assoc($res)) {
   $eventArray['id'] = $row['id'];
   $eventArray['title'] =  $row['title'];
   $eventArray['start'] = $row['startDate'];
   $events[] = $eventArray;
}

echo json_encode($events);

?>

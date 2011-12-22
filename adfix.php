<?php
//$url = 'http://s-web1/student_guardian_maintenance_dev/default.asp?id=' . $login
$url = 'http://s-moodledev2.midkent.ac.uk/blocks/ilp/templates/custom/test.html'; ?>

<!-- force the ad block to load only after the rest of the page has loaded -->
<script type="text/javascript" src="http://moodledev2.midkent.ac.uk/blocks/ilp/templates/custom/fullcalendar/jquery/jquery-1.4.3.min.js"></script>
    <script>

$(document).ready(function() {
 alert("Thanks for visiting!");

$('#test').load("<?php echo 'testing' ?>");
});
</script>


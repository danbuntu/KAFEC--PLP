<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 23/11/11
 * Time: 16:33
 * To change this template use File | Settings | File Templates.
 */
?>
<script type="text/javascript" src="./jquery/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="./jquery/js/jquery-ui-1.8.16.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="./jquery/css/ui-lightness/jquery-ui-1.8.9.custom.css"/>

<?php

$studentid = $_POST['studentid'];
$studentname = $_POST['studentname'];
$courseid = $_POST['courseid'];
$currentuser = $_POST['currentuser'];

print_r($CFG->user);

?>

<link rel="stylesheet" type="text/css" href="' . $siteurl . '/theme/midkent_newstyle/style.css"/>
<link rel="stylesheet" type="text/css" href="./badges/styles.css"/>

<h2>Add a new progression target for <?php echo $studentname; ?></h2>


<form method="POST" action="/blocks/ilp/templates/custom/process_add_progression_target.php">


    <textarea name="target" cols="100" rows="30"></textarea>

    <div class="demo">
        Date : <input type="text" name="date" id="datepicker">
    </div>
    Set By: <input type="text" name="setby" value="<?php echo $currentuser;?>">
    <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">

    <input type="hidden" name="courseid" value="<?php echo $courseid; ?>">
    <input type="hidden" name="currentuser" value="<?php echo $currentuser; ?>">
    <br/><input type="submit" value="Add Target">
</form>


<SCRIPT>
    $(function() {
        $("#datepicker").datepicker();
    });
</SCRIPT>


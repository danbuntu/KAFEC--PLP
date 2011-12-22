<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 24/11/11
 * Time: 15:50
 * To change this template use File | Settings | File Templates.
 */
?>
<script type="text/javascript" src="./jquery/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="./jquery/js/jquery-ui-1.8.16.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="./jquery/css/ui-lightness/jquery-ui-1.8.9.custom.css"/>

<?php


include('moodle_connection_mysqli.php');
$id = $_POST['id'];
$studentname = $_POST['studentname'];
$courseid = $_POST['courseid'];

?>

<link rel="stylesheet" type="text/css" href="'../../../../theme/midkent_newstyle/style.css"/>
<link rel="stylesheet" type="text/css" href="./badges/styles.css"/>

<div id="badges">
    <h1>Edit progression target for <?php echo $studentname; ?></h1>

<?php

    $query = "SELECT * FROM progression_targets WHERE id='$id'";

    $result = $mysqli->query($query);

    while ($row = $result->fetch_object()) {
        ?>

        <form method="POST" action="/blocks/ilp/templates/custom/process_edit_progression_target.php">


            <textarea name="target" cols="100" rows="30"><?php echo $row->target; ?></textarea>

            <div class="demo">
                Date : <input type="text" name="date" id="datepicker"
                              value="<?php echo date("h:i:s d-m-Y", strtotime($row->date)); ?>">
            </div>
            Set by:<input type="text" name="setby" value="<?php echo $row->setby; ?>">
            <input type="hidden" name="studentid" value="<?php echo $row->studentid; ?>">

            <input type="hidden" name="courseid" value="<?php echo $courseid; ?>">
            <input type="hidden" name="currentuser" value="<?php echo $currentuser; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <?php if ($row->completed == 1) {
            $checked = 'checked="yes"';
        } else {
            $checked = '';
        }
            ?>

            <br/>Target Completed: <input type="checkbox" name="checkbox" <?php echo $checked ?>><br/>
            <input type="submit" value="Save changes">
        </form>
        <?php

    }

    ?>

</div>

<SCRIPT>
    $(function() {
        $("#datepicker").datepicker();
    });
</SCRIPT>

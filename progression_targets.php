<?php

// Displays the current progression targets for a student

$query = "SELECT * FROM progression_single_target WHERE studentid='" . $studentid . "'";
$result = $mysqli->query($query);
echo '<table><tr><td>';
echo 'In order to progress to ';
echo '</td>';

$num_rows = $result->num_rows;

?>
<form method="POST" action="/blocks/ilp/templates/custom/process_progression_target_single.php">

    <?php if ($num_rows == 1) {
    while ($row = $result->fetch_object()) {
        echo '<td><input type="text"  name="target" value="' . $row->target . '"></td>';
    }
} else {
    echo '<td><input type="text" name="target" value="........"></td>';
}
    ?>

    <input type="hidden" name="studentname" value="<?php echo fullname($user); ?>">
    <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
    <input type="hidden" name="courseid" value="<?php echo $courseid; ?>">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
    <?php if (has_capability('block/ilp_student_info:viewclass', $context)) { ?>
    <td><input type="submit" value="update"></td></tr></table>
    <?php } ?>
</form>
<br/>
<?php

$query = "SELECT * FROM progression_targets WHERE studentid='" . $studentid . "' ORDER BY number";

$result = $mysqli->query($query);
?>

<?php
while ($row = $result->fetch_object()) {
    ?>
<table width="100%">
    <tr class="darkblue progression">
        <th align="center">Number</th>
        <th align="center">Date Set</th>
        <th align="center">Set By</th>
        <th align="center">Completed</th>
    </tr>
    <tr class="yellow progression">
        <td align="center"><?php echo $row->number; ?></td>
        <td align="center"><?php echo date(" d-m-Y", strtotime($row->date)); ?></td>
        <td align="center"><?php echo $row->setby; ?></td>
        <?php
                        if ($row->completed == 1) {
        echo '<td align="center"><img src="./templates/custom/pix/tick-icon.png"></td>';
    } else {
        echo '<td align="center"><img src="./templates/custom/pix/delete-icon.png"></td>';
    }
        ?>
    </tr>

    <tr class="darkblue progression">
        <th align="center" colspan="3">Target</th>
        <td rowspan="2" class="yellow" align="center">
            <?php  if (has_capability('block/ilp_student_info:viewclass', $context)) { ?>
            <form method="POST" action="/blocks/ilp/templates/custom/edit_progression_target.php">
                <input type="hidden" name="studentname" value="<?php echo fullname($user); ?>">
                <input type="hidden" name="courseid" value="<?php echo $courseid; ?>">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                <input type="submit" value="Edit">
            </form>
            <?php
        } else {
            echo 'You don\'t have permisison to edit targets';
        } ?>
        </td>
    </tr>
    <tr class="yellow">
        <td align="center" colspan="3"><?php echo $row->target; ?></td>
    </tr>
</table>
<br/>

        <?php

}

if (has_capability('block/ilp_student_info:viewclass', $context)) {
    ?>

<form method="POST" name="add" action="/blocks/ilp/templates/custom/add_progression_target.php">
    <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
    <input type="hidden" name="studentname" value="<?php echo fullname($user); ?>">
    <input type="hidden" name="courseid" value="<?php echo $courseid; ?>">
    <input type="hidden" name="currentuser" value="<?php echo $USER->username; ?>">
    <input type="submit" value="Add New Progression Target">
</form>

<?php } ?>
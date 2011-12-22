<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo 'phone= ' . $USER->phone2;
echo 'Send text message to ' . fullname($user) . '</br>';

$url = $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $user->id;

echo '<form action="/blocks/ilp/templates/custom/send_txt.php" method="POST">';
echo '<textarea name="limitedtextarea" onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,100);" ';
echo 'onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,140);">';
echo '</textarea><br>';
echo '<font size="1">(Maximum characters: 140)<br>';
echo 'You have <input readonly type="text" name="countdown" size="3" value="140"> characters left.</font>';
echo '<input type="hidden" name="url" value="' . $url . '" />';
echo '</br>';
echo '<input type="hidden" name="phone" value="' . $USER->phone2 . '" />';
echo '<input type="submit" value="Submit" />';
echo '</form>';

?>

<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
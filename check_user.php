<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 20/10/11
 * Time: 08:59
 * Used to gaffer tape a problem with our user account system
 * We created multipleaccounts for some students by accident
 */

$query = "SELECT * FROM mdl_user WHERE id='" . $studentid . "' AND description='Acoount created as part of Guardian insert'";
//echo $query;
$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {
    echo '<font color="red"><b>!!STOP THIS IS A GUARDIAN ACCOUNT!! DO NOT UPDATE USE THIS PLP!!!</b><br/>';
    echo 'Please remove this user from your course and if in any doubt contact IT</font>';
}

?>

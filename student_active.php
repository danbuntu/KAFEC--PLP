<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 05/08/11
 * Time: 09:00
 * To change this template use File | Settings | File Templates.
 */

//$result = $client->getStudentWithdrawn(trim($student_number));

$result = $client->__soapCall("getStudentWithdrawn",array($student_number));

if ($result->withdrawn == 'yes') {
     echo '<h1><font color="red">The Student has withdrawn</font></h1>';
}

unset($result);

?>
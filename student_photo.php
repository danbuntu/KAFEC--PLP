<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 28/07/11
 * Time: 10:53
 * To change this template use File | Settings | File Templates.
 */
 
//try {
//$resultPhoto = $client->__soapCall("getStudentPhotoById", array($student_number));
//}
//
//catch(SoapFault $e){
// echo 'Photo not found';
//}


$resultPhoto = $client->__soapCall("getStudentPhotoById",array($student_number));



foreach ($resultPhoto as $key => $item) {
    $studentphoto = $item;
}

unset($resultPhoto);

?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 18/10/11
 * Time: 16:19
 * To change this template use File | Settings | File Templates.
 */
include('moodle_connection_mysqli.php');
include('../../../../config.php');


$client2 = new SoapClient(null, array(
             'location' => 'https://xmlservices.midkent.ac.uk/restserver.php',
             'uri'      => 'urn://https:/xmlservices.midkent.ac.uk/',
        'connection_timeout' => 120,
             'trace'    => 1 ));

global $CFG;
//print_r($COURSE);
//        echo 'process the passport';

$JobEmail = 'jobshop@midkent.ac.uk';
//$JobEmail = 'dan.attwood@midkent.ac.uk';
$studentEmail = $_POST['studentEmail'];
echo $studentEmail;
$learner_ref = $_POST['learner_ref'];
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$s3 = $_POST['s3'];
$g1 = $_POST['g1'];
$g2 = $_POST['g2'];
$g3 = $_POST['g3'];
$bcomp = $_POST['bcomp'];
$scomp = $_POST['scomp'];
$gcomp = $_POST['gcomp'];
$bcompCurrent = $_POST['bcompcurrent'];
$scompCurrent = $_POST['scompcurrent'];
$gcompCurrent = $_POST['gcompcurrent'];
$learnerusername = $_POST['learnerusername'];
echo 'b1: ' . $b1;
echo $learnerusername;

// loop though the b's and reset on to be a 1
for ($i = 1; $i <= 3; $i++) {
    if (${b . $i} == on) {
        ${b . $i} = '1';
    } else {
        ${b . $i} = '0';
    }
}
echo 'b1: ' . $b1;
// loop though the s's and reset on to be a 1
for ($i = 1; $i <= 3; $i++) {
    if (${s . $i} == on) {
        ${s . $i} = '1';
    } else {
        ${s . $i} = '0';
    }
}

// loop though the g's and reset on to be a 1
for ($i = 1; $i <= 3; $i++) {
    if (${g . $i} == on) {
        ${g . $i} = '1';
    } else {
        ${g . $i} = '0';
    }
}

// loop though the completed ones and reset on to be a 1
if ($bcomp == on) {
    $bcomp2 = '1';
} else {
    $bcomp2 = '';
}

if ($scomp == on) {
    $scomp2 = '1';
} else {
    $scomp2 = '';
}

if ($gcomp == on) {
    $gcomp2 = '1';
} else {
    $gcomp2 = '';
}

$courseid = $_POST['courseid'];
$learnerid = $_POST['learnerid'];

//        echo $learner_ref;

echo '<h1>Stamping your passport please wait</h1>';

// Check that a record exists for the user in the passport table and create if needed

$query = "SELECT * FROM passport WHERE learner_ref='" . $learner_ref . "'";
//        echo $query;
$result = $mysqli->query($query);

if ($result->num_rows != 1) {
    // dosen't exist so create a record
    echo 'create a record';
    $queryInsert = "INSERT INTO passport (learner_ref) VALUES ('" . $learner_ref . "')";
    $mysqli->query($queryInsert);
} else {
    echo 'passport record already exists';
}

$update = "UPDATE passport SET ";
$bs = " b1='" . $b1 . "', b2='" . $b2 . "',b3='" . $b3 . "',";
$ss = " s1='" . $s1 . "', s2='" . $s2 . "',s3='" . $s3 . "',";
$gs = " g1='" . $g1 . "', g2='" . $g2 . "',g3='" . $g3 . "',";
$comps = " bcomp='" . $bcomp2 . "', scomp='" . $scomp2 . "',gcomp='" . $gcomp2 . "'";
$where = " WHERE learner_ref='$learner_ref'";
$queryIns = $update . $bs . $ss . $gs . $comps . $where;
        echo $queryIns;
$mysqli->query($queryIns);
if ($mysqli->errno) {
    echo 'error connecting' . $mysqli->error;
}


// check if the criteria have just been completed and email the job shop to let them know.

if (($b1 == 1) && ($b2 == 1) && ($b3 == 1)) {
    echo 'all criteria completed';
try {
      $group =  $client2->__soapCall("addUserToJobShopGroup", array($learnerusername));
} catch (SoapFault $E) {
    echo $E->faultstring;
}
    // check if an email has already been sent
    $queryCheck = "SELECT bemail FROM passport WHERE learner_ref='" . $learner_ref . "'";
    $result = $mysqli->query($queryCheck);
    echo $queryCheck;

    while ($row = $result->fetch_object()) {
        if (($row->bemail != 1) OR (empty($row->bemail))) {
            echo 'bemail is ' . $row->bemail . 'sending email';
            sendemail('bronze', 'jobshop', $learnerid, $JobEmail);
            $query = "UPDATE passport set bemail='1' WHERE learner_ref='" . $learner_ref . "'";
            $mysqli->query($query);
        }
    }
}

if (($s1 == 1) && ($s2 == 1) && ($s3 == 1)) {
    echo 'all criteria completed';

 try {
      $group =  $client2->__soapCall("addUserToJobShopGroup", array($learnerusername));
} catch (SoapFault $E) {
    echo $E->faultstring;
}

    echo 'test';
    // check if an email has already been sent
    $queryCheck = "SELECT semail FROM passport WHERE learner_ref='" . $learner_ref . "'";
    $result = $mysqli->query($queryCheck);

    while ($row = $result->fetch_object()) {
        if ($row->semail != 1) {

            sendemail('Silver', 'jobshop', $learnerid, $JobEmail);
            $query = "UPDATE passport set semail='1' WHERE learner_ref='" . $learner_ref . "'";
            $mysqli->query($query);
        }
    }
}

if (($g1 == 1) && ($g2 == 1) && ($g3 == 1)) {
    echo 'all criteria completed';

  try {
      $group =  $client2->__soapCall("addUserToJobShopGroup", array($learnerusername));
} catch (SoapFault $E) {
    echo $E->faultstring;
}

    // check if an email has already been sent
    $queryCheck = "SELECT gemail FROM passport WHERE learner_ref='" . $learner_ref . "'";
    $result = $mysqli->query($queryCheck);

    while ($row = $result->fetch_object()) {
        if ($row->gemail != 1) {
            sendemail('Gold', 'jobshop', $learnerid, $JobEmail);
            $query = "UPDATE passport set gemail='1' WHERE learner_ref='" . $learner_ref . "'";
            $mysqli->query($query);
        }
    }
}


//check the completed flags and do automatic stuff is awards have been signed off by the jobshop

// see if the bronze badge has been awarded

echo '<br/>';

echo 'bcomp ' . $bcomp;
echo 'bcompCurrent ' . $bcompCurrent;

if ($bcompCurrent === $bcomp) {
    echo 'no change';
} else {
    if (($bcomp == 'on') && ($bcompCurrent == 'off')) {
        echo 'bronze award completed';
        //                $to =
        sendemail('bronze', 'award', $learnerid, $to);
    } else {
        echo 'nothing';
    }
}

if ($scompCurrent === $scomp) {
    echo 'no change';
} else {
    if (($scomp == 'on') && ($scompCurrent == 'off')) {
        echo 'silver award completed';
        sendemail('silver', 'award', $learnerid, $to);
    } else {
        echo 'nothing';
    }
}

if ($gcompCurrent === $gcomp) {
    echo 'no change';
} else {
    if (($gcomp == 'on') && ($gcompCurrent == 'off')) {
        echo 'gold award completed';
        sendemail('gold', 'award', $learnerid, $to);
    } else {
        echo 'nothing';
    }
}

echo '<meta http-equiv="refresh" content="1;url=' . $CFG->wwwroot . '/blocks/ilp/view.php?courseid=' . $courseid . '&id=' . $learnerid . '#tabs-7">';


function sendemail($award, $message, $learnerid, $to)
{

    //    select the message
    if ($message == 'award') {
        $message = "Congratulations you have been awarded the $award award on the employability passport.
http://moodle.midkent.ac.uk/blocks/ilp/view.php
       .";
        $subject = "You have been awarded the $award award on the  employability passport";
    } elseif ($message == 'jobshop') {
        $subject = "A student has finished all criteria for the $award award";
        $message = "A student has finished all the criteria for the $award award.  Please check
        http://moodle.midkent.ac.uk/blocks/ilp/view.php?courseid=1&id=" . $learnerid . "";
    }

    $headers = 'From: plp@midkent.ac.uk';

    mail($to, $subject, $message, $headers);
}


?>
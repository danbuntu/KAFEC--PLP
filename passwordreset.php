<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$host = "ldaps://midkent.ac.uk:636";
//$port = "3268";

 //$port = '636';
$username = 'administrator@midkent.ac.uk';
$pswd = 'xxx';
$connection = ldap_connect($host)
        or die ("Can't establish LDAP Connection");
//$basedn = "(ou=users, dc=midkent, dc=ac, dc=uk";

$filter = "(|(description=09070045))";
$attributes = array("cn","sn","userPassword", "mail", "useraccountcontrol", "description", "pwdlastset", "lastlogontimestamp");


ldap_bind($connection, $username, $pswd)
        or die ("Can't bind to ad");

$results = ldap_search($connection,  "ou=guardians, ou=users ou, dc=midkent, dc=ac, dc=uk" , $filter, $attributes );

//print_r($results);

//dump results into an array
$entries = ldap_get_entries($connection, $results);

echo '<br/>';
echo '<br/>';

$count = $entries["count"];

//cycle thorught he outpuat and format nicely
for ($x=0; $x < $count; $x++) {
    printf("%s ", $entries[$x]["cn"][0]);
    printf("(%s) <br/> ", $entries[$x]["sn"][0]);
    printf("(%s) <br/> ", $entries[$x]["userPassword"][0]);
    printf("(%s) <br/> ", $entries[$x]["mail"][0]);
    printf("(%s) <br/> ", $entries[$x]["useraccountcontrol"][0]);
    printf("(%s) <br/> ", $entries[$x]["description"][0]);
    printf("(%s) <br/> ", $entries[$x]["pwdlastset"][0]);
    printf("(%s) <br/> ", $entries[$x]["lastlogontimestamp"][0]);
    $passchange =  $entries[$x]["pwdlastset"][0];
    $lastlogon =  $entries[$x]["lastlogontimestamp"][0];

   echo '$passchange is ' . $passchange .  '<br/>';
 //   $lastlogon = $entries[$x]["lastlogontimestamp"][0];
    $newdate = win_filetime_to_timestamp($passchange) . '<br/>';

    echo 'newdate is ' . $newdate . '<br/>';
  //  echo win_filetime_to_timestamp($lastlogon) . '<br/>';
    echo 'passchange after function is ' .  $passchange . '<br/>';
    $passchange2 = date("d-m-Y h:i:s", $newdate);
  //  $lastlogon2 = date("d-m-Y h:i:s", $lastlogon);
    echo 'date of last password change ' .  $passchange2 . '<br/>';

    //workout and display the last logon
     $newdate2 = win_filetime_to_timestamp($lastlogon) . '<br/>';
       $lastlogon2 = date("d-m-Y h:i:s", $newdate2);
     echo 'date of last logon to college machine is ' .  $lastlogon2 . '<br/>';
  //  echo 'date of last logon to college system ' .  $lastlogon2 . '<br/>';
    echo '<br/>';
    echo '<br/>';

    $password = Welcome1;
echo $password;


$entry = ldap_first_entry($connection, $results);

if (!is_resource($entry))
{
    exit('Couldn\'t get entry');
}


 $newPass = "{SHA}" . base64_encode( pack( "H*", sha1( $password ) ) );
$userDn = ldap_get_dn($connection, $entry);

ldap_modify($connection, $userDn, array('unicodePwd' => $newPass));

}



  function win_filetime_to_timestamp($passchange) {
    $win_secs = substr($passchange, 0, strlen($passchange) - 7); // divide by 10 000 000 to get seconds
    $unix_timestamp = ($win_secs - 11644473600); // 1.1.1600 -> 1.1.1970 difference in seconds
    return $unix_timestamp;
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



// set the ldap host

$host = "midkent.ac.uk";
$port = "3268";
$username = 'administrator@midkent.ac.uk';
$pswd = 'F!REw0rk';
$connection = ldap_connect($host, $port)
        or die ("Can't establish LDAP Connection");
$basedn = "(ou=users, dc=midkent, dc=ac, dc=uk";

$filter = "(|(description=*))";
$attributes = array("cn","sn","mail","sAMAccountName" , "useraccountcontrol", "description", "pwdlastset", "lastlogontimestamp");




ldap_bind($connection, $username, $pswd)
        or die ("Can't bind to ad");

$results = ldap_search($connection, $basedn , $filter, $attributes );


//print_r($results);

//dump results into an array
$entries = ldap_get_entries($connection, $results);

echo '<br/>';
echo '<br/>';

$count = $entries["count"];

//cycle thorught he outpuat and format nicely
for ($x=0; $x < $count; $x++) {
    printf("%s ", $entries[$x]["cn"][0]);
    printf("(%s) <br/> ", $entries[$x]["mail"][0]);
    printf("(%s) <br/> ", $entries[$x]["useraccountcontrol"][0]);
    printf("(%s) <br/> ", $entries[$x]["description"][0]);
    printf("(%s) <br/> ", $entries[$x]["pwdlastset"][0]);
    printf("(%s) <br/> ", $entries[$x]["lastlogontimestamp"][0]);
    $passchange =  $entries[$x]["pwdlastset"][0];
    $lastlogon =  $entries[$x]["lastlogontimestamp"][0];
    $account = $entries[$x]["sAMAccountName"][0];
    
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
    
}


$entries = ldap_get_entries($connection, $results);




//change password
echo '<form action="passwordreset.php">';
echo '<input type="submit" value="change password" />';
echo '</form >';






//close the ldap connection
ldap_unbind($connection)
    or die ("Could not unbind LDAP Connection");

//convert the pwdlastset windows timestamp into date
function win_filetime_to_timestamp ($passchange) {
echo 'filename is ' . $passchange . '<br/>';
  $win_secs = substr($passchange,0,strlen($passchange)-7); // divide by 10 000 000 to get seconds
  $unix_timestamp = ($win_secs - 11644473600); // 1.1.1600 -> 1.1.1970 difference in seconds
  return $unix_timestamp;
}

?>

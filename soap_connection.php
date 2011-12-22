<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 20/06/11
 * Time: 10:50
 * Define the soap server connection
 */

//$ws = "https://xmlservicesdev.midkent.ac.uk/xmlservices.php?wsdl";
//
//$client = new SoapClient($ws);

//var_dump($client->__getFunctions());

//$client = new SoapClient("https://xmlservices.midkent.ac.uk/xmlservices.php?wsdl");


 $client = new SoapClient(null, array(
              'location' => 'https://xmlservicesdev.midkent.ac.uk/restserver.php',
              'uri'      => 'urn://https:/xmlservicesdev.midkent.ac.uk/',
         'connection_timeout' => 240,
              'trace'    => 1 ));



?>
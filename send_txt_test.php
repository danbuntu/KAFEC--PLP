<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$message = 'from moodledev - with proxy';
//echo $message;
$number = '+447799625520';

$xml = "<?xml version='1.0' ?>
<Request>
<Authentication>
<Username><![CDATA[xxx]]></Username>
<Password><![CDATA[xxx]]></Password>
</Authentication>
<Message>
<MessageText><![CDATA[". $message . "]]></MessageText>
<Phone><![CDATA[" . urlencode($number) . "]]></Phone>
<Type>1</Type>
<MessageDate>1234567890</MessageDate>
<UniqueID><![CDATA[Just an ID]]></UniqueID>
<From><![CDATA[Dattwood]]></From>
</Message>
</Request>";

header("Content-type: text/xml");
echo $xml;
$url = 'http://www.txttools.co.uk/connectors/XML/xml.jsp';

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_NTLM);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
//curl_setopt($ch,CURLOPT_PORT,80);
curl_setopt($ch, CURLOPT_PROXY, "http://10.0.100.61:8080");
curl_setopt($ch, CURLOPT_PROXYUSERPWD, "MIDKENT\proxys:pr0xyS");


curl_setopt($ch, CURLOPT_POSTFIELDS, "XMLPOST=$xml");


$data = curl_exec($ch);

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

	var_dump($data);

?>

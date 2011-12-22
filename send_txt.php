<?php


// allows sending of texts through txttools
$message = $_POST["limitedtextarea"];
$number = $_POST["phone"];
$url = $_POST['url'];

//echo $message;
//echo $number;

$message = 'hello there no curl again';
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

//
header("Content-type: text/xml");
echo $xml;
$url = 'http://www.txttools.co.uk/connectors/XML/xml.jsp';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);

curl_setopt($ch, CURLOPT_POSTFIELDS, "XMLPOST=$xml");

$data = curl_exec($ch);

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

echo 'Message Sent redirecting back to the students PLP';

echo '<meta http-equiv="Refresh" content="1;URL="' . $url . '/>';
?>
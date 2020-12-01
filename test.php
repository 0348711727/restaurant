

<?php
require '';
$basic  = new \Nexmo\Client\Credentials\Basic('8d0feae9', 'xxtJnOGI1wQIQPjD');
$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' => '84348711727',
    'from' => 'Vonage APIs',
    'text' => 'Hello from Vonage SMS API'
]);

?>
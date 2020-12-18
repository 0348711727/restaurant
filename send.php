<?php

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/ACa0524f378593e6a630d31d0d0189220b/Messages.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'To=%2B84921195133&From=%2B12076058525&Body=',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic QUNhMDUyNGYzNzg1OTNlNmE2MzBkMzFkMGQwMTg5MjIwYjoyYzk0OWQ4MmM5Y2U3OThiMTcyZTNlM2JiNTkyOGNmOA==',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
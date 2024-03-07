<?php
$curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/track?order_id=125224311",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
	CURLOPT_HTTPGET  => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
	   "Authorization: Bearer  eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2NTI5MzMsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjI2MzY0Mjk4LCJleHAiOjE2MjcyMjgyOTgsIm5iZiI6MTYyNjM2NDI5OCwianRpIjoiQk42cmU3b3dtWDAzMzB4cyJ9.Xj_Shf4WGQ5oFbEizknixnX3GpZ8meI1jUvtd57niBQ"
    ),
  ));
  $SR_login_Response = curl_exec($curl);
  curl_close($curl);
  //$SR_login_Response_out = json_decode($SR_login_Response);
  echo '<pre>';
  print_r($SR_login_Response);
?>
<?php
session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        "X-Api-Key:test_0c1b1866832591cb3bab8476589",
        "X-Auth-Token:test_c7d7c7bfd47907958cbcc7a9dd8"
    )
);
$payload = array(
    'purpose' => 'Buy Car',
    'amount' => '12500',
    'phone' => '9916493213',
    'buyer_name' => 'Saurav Poojary',
    'redirect_url' => 'http://localhost/admin/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'sauravproject855@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$response = json_decode ($response);





$_SESSION['TID']=$response->payment_request->id;
header('location:'.$response->payment_request->longurl);

?>

<h1>TEST I'm HERE</h1>



<?php
//next example will recieve all messages for specific conversation
$service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/84943/?key=HackTripAdvisor-ade29ff43aed';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);



if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}

$json = json_decode($curl_response, true);
print_r($json['reviews'][1]['text']); //these are the general array indicies for getting comments from the response
curl_close($curl);
?>
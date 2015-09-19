<?php

$cityCodes = [
    "0" => "6387666",
    "1" => "5121744",
    "2" => "455018",
    "3" => "8423215",
    "4" => "666282",
    "5" => "1506970",
];

$service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/'.$cityCodes[rand(0,5)].'/?key=HackTripAdvisor-ade29ff43aed';

$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);

if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}

$json = json_decode($curl_response, true);

$fakeCities = [
    "0" => "Boston, United States",
    "1" => "Shanghai, China",
    "2" => "Rio de Janeiro, Brazil",
    "3" => "Cimarron, United States",
    "4" => "Oslo, Norway",
    "5" => "Cairo, Egypt",
    "6" => "Cape Town, South Africa",
    "7" => "Venice, Italy",
    "8" => "New Dehli, India",
    "9" => "Tulsa, United States",
    "10" => "Reykjavik, Iceland",
    "11" => "San Antonio, United States",
];
$fakeCities2 = [
    "0" => "Rockport, United States",
    "1" => "Beijing, China",
    "2" => "Valencia, Venezuela",
    "3" => "Phoenix, United States",
    "4" => "Copenhagen, Denmark",
    "5" => "Casablanca, Morocco",
    "6" => "Addis Ababa, Ethiopia",
    "7" => "Florence, Italy",
    "8" => "Tokyo, Japan",
    "9" => "Indianapolis, United States",
    "10" => "Stockholm, Sweden",
    "11" => "Toronto, Canada",
];
$fakeCities3 = [
    "0" => "Los Angeles, United States",
    "1" => "Singapore, Singapore",
    "2" => "Santiago, Chile",
    "3" => "Denver, United States",
    "4" => "Moskow, Russia",
    "5" => "Nairobi, Kenya",
    "6" => "Honolulu, Hawaii",
    "7" => "Papeete, French Polynesia",
    "8" => "Bismarck, United States",
    "9" => "Sioux Falls, United States",
    "10" => "Seoul, South Korea",
    "11" => "Cancun, Mexico",
];

$fakeCity1 = $fakeCities[rand (0 ,11)];
$fakeCity2 = $fakeCities2[rand (0 ,11)];
$fakeCity3 = $fakeCities3[rand (0 ,11)];

echo('{ "fakeCity1: "'.$fakeCity1.'", fakeCity2: "'.$fakeCity2.'", fakeCity3: "'.$fakeCity3.'", realCity: "'.$json['address_obj']['city'].', '.$json['address_obj']['country'].'", comment: "'.$json['reviews'][0]['text'].'",}');

// echo($fakeCity1);
// echo($fakeCity2);
// echo($fakeCity3);

//echo($json['address_obj']['city'].', '.$json['address_obj']['country']);
//echo($json['reviews'][0]['text']); //these are the general array indicies for getting comments from the response
?>
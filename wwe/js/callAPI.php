<?php

$cityCodes = [
    "0" => "6387666",
    "1" => "5121744",
    "2" => "455018",
    "3" => "8423215",
    "4" => "666282",
    "5" => "14242724",
    "6" => "7387058",
    "7" => "1541164",
    "8" => "296037",
    "9" => "190203",
    "10"=> "1627249",
    "11"=> "548766",
    "12"=> "678443",
    "13"=> "6495421",
    "14"=> "6845073",
    "15"=> "6439033",
    "16"=> "6825394",
    "17"=> "6502610",
    "18"=> "1965629",
    "19"=> "1315551",
    "20"=> "1783442",
    "21"=> "279029",
    "22"=> "279029",
    "23"=> "2098300",
    "24"=> "817336",
    "25"=> "676922",
    "26"=> "3369701",

];

$service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/'.$cityCodes[rand(0,26)].'/?key=HackTripAdvisor-ade29ff43aed';

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

echo('{ "fakeCity1": "'.$fakeCity1.'", "fakeCity2": "'.$fakeCity2.'", "fakeCity3": "'.$fakeCity3.'", "realCity": "'.$json['address_obj']['city'].', '.$json['address_obj']['country'].'", "comment": "'.$json['reviews'][3]['text'].'"}');

?>
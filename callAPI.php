<h1>TEST I'm HERE</h1>



<?php
//next example will recieve all messages for specific conversation

$cityCodes = [
    "0" => "44881",
    "1" => "293734",
    "2" => "297390",
    "3" => "293974",
    "4" => "293924",
    "5" => "274707",
    "6" => "186338",
];
echo('http://api.tripadvisor.com/api/partner/2.0/location/'.$cityCodes[rand(0,6)].'/?key=HackTripAdvisor-ade29ff43aed');
$service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/'.$cityCodes[rand(0,6)].'/?key=HackTripAdvisor-ade29ff43aed';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);



if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}

$json = json_decode($curl_response, true);
//print_r($curl_response);
$fakeCities = [
    "0" => "Boston, MA, USA",
    "1" => "Shanghai, China",
    "2" => "Rio de Janeiro, Brazil",
    "3" => "Cimarron, New Mexico, USA",
    "4" => "Oslo, Norway",
    "5" => "Cairo, Egypt",
    "6" => "Cape Town, South Africa",
    "7" => "Venice, Italy",
    "8" => "New Dehli, India",
    "9" => "Tulsa, Oklahoma, USA",
    "10" => "Reykjavik, Iceland",
    "11" => "San Antonio, Texas, USA",
];
$fakeCities2 = [
    "0" => "Rockport, MA, USA",
    "1" => "Beijing, China",
    "2" => "Valencia, Venezuela",
    "3" => "Phoenix, Arizona, USA",
    "4" => "Copenhagen, Denmark",
    "5" => "Casablanca, Morocco",
    "6" => "Addis Ababa, Ethiopia",
    "7" => "Florence, Italy",
    "8" => "Tokyo, Japan",
    "9" => "Indianapolis, Indiana, USA",
    "10" => "Stockholm, Sweden",
    "11" => "Toronto, Canada",
];
$fakeCities3 = [
    "0" => "Los Angeles, CA, USA",
    "1" => "Singapore, Singapore",
    "2" => "Santiago, Chile",
    "3" => "Denver, Colorado, USA",
    "4" => "Moskow, Russia",
    "5" => "Nairobi, Kenya",
    "6" => "Honolulu, Hawaii",
    "7" => "Papeete, French Polynesia",
    "8" => "Bismarck, North Dakota, USA",
    "9" => "Sioux Falls, South Dakota, USA",
    "10" => "Seoul, South Korea",
    "11" => "Cancun, Mexico",
];


$fakeCity1 = $fakeCities[rand (0 ,11)];
$fakeCity2 = $fakeCities2[rand (0 ,11)];
$fakeCity3 = $fakeCities3[rand (0 ,11)];

print_r($fakeCity1);
print_r($fakeCity2);
print_r($fakeCity3);

print_r($json['address_obj']['city'].', '.$json['address_obj']['country']);
 //these are the general array indicies for getting comments from the response
print_r($json['description']); //temp until we finalize codes

//curl_close($curl);
?>
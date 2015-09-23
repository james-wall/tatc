<?php
 header("Access-Control-Allow-Origin: *");
// $cityCodes = [
//     "0" => "6387666",
//     "1" => "455018",
//     "2" => "666282",
//     "3" => "1541164",
//     "4" => "296037",
//     "5" => "190203",
//     "6"=> "1627249",
//     "7"=> "5537033",
//     "8"=> "6495421",
//     "9"=> "6845073",
//     "10"=> "6439033",
//     "11"=> "6825394",
//     "12"=> "6502610",
//     "13"=> "1965629",
//     "14"=> "3748609",
//     "15"=> "098300",
//     "16"=> "817336",
//     "17"=> "5549488",
//     "18"=> "3369701",
//     "19"=> "7253362",
// ];

 calls();

 function calls() {
     //************** Entirely Random ***************************//
    $randomAPICall = rand(100000, 9999999);
    $service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/'.$randomAPICall.'/?key=8B89F4BDB7F64B79A1533D6EA207C3D5';
    //*************** Demo Purposes ******************************//
    // $rand = rand(0,19);
    // $service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/'.$cityCodes[$rand].'/?key=8B89F4BDB7F64B79A1533D6EA207C3D5';
    // ****************************************************** //
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);

    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additional info: ' . var_export($info));
    }

    $json = json_decode($curl_response, true);
    rest($json);
}

function rest($json) {

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

    if($json['address_obj']['country'] != "" && $json['address_obj']['city'] != "") {
        $at = count($json['reviews']) - rand(0, count($json['reviews']));
        $str = '{ "fakeCity1": "'.$fakeCity1.'", "fakeCity2": "'.$fakeCity2.'", "fakeCity3": "'.$fakeCity3.'", "realCity": "'.$json['address_obj']['city'].', '.$json['address_obj']['country'].'", "comment": "'.$json['reviews'][$at]['text'].'", "url": "'.$json['web_url'].'"}';

    }
    else {
        calls();
    }

    // $str = '{ "fakeCity1": "'.$fakeCity1.'", "fakeCity2": "'.$fakeCity2.'", "fakeCity3": "'.$fakeCity3.'", "realCity": "'.$json['address_obj']['city'].', '.$json['address_obj']['country'].'", "comment": "'.$json['reviews'][3]['text'].'", "url": "'.$json['web_url'].'"}';

    echo($str);
}
?>
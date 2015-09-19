<?php

//https://gist.github.com/skyzyx/1478912 <- LOOK AT THIS

if (!class_exists('CFRuntime')) die('No direct access allowed.');
/**
 * Stores your AWS account information. Add your account information, and then rename this file
 * to 'config.inc.php'.
 *
 * @version 2011.12.14
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://aws.amazon.com/php/ PHP Developer Center
 * @link http://aws.amazon.com/security-credentials AWS Security Credentials
 */

CFCredentials::set(array(

    // Credentials for the development environment.
    'development' => array(

        // Amazon Web Services Key. Found in the AWS Security Credentials. You can also pass
        // this value as the first parameter to a service constructor.
        'key' => 'development-key',

        // Amazon Web Services Secret Key. Found in the AWS Security Credentials. You can also
        // pass this value as the second parameter to a service constructor.
        'secret' => 'development-secret',

        // This option allows you to configure a preferred storage type to use for caching by
        // default. This can be changed later using the set_cache_config() method.
        //
        // Valid values are: `apc`, `xcache`, or a file system path such as `./cache` or
        // `/tmp/cache/`.
        'default_cache_config' => '',

        // Determines which Cerificate Authority file to use.
        //
        // A value of boolean `false` will use the Certificate Authority file available on the
        // system. A value of boolean `true` will use the Certificate Authority provided by the
        // SDK. Passing a file system path to a Certificate Authority file (chmodded to `0755`)
        // will use that.
        //
        // Leave this set to `false` if you're not sure.
        'certificate_authority' => false
        ),

    // Specify a default credential set to use if there are more than one.
'@default' => 'development'
));


$cityCodes = [
"0" => "6387666",
"1" => "455018",
"2" => "666282",
"3" => "1541164",
"4" => "296037",
"5" => "190203",
"6"=> "1627249",
"7"=> "678443",
"8"=> "6495421",
"9"=> "6845073",
"10"=> "6439033",
"11"=> "6825394",
"12"=> "6502610",
"13"=> "1965629",
"14"=> "279029",
"15"=> "2098300",
"16"=> "817336",
"17"=> "676922",
"18"=> "3369701",

];

$rand = rand(0,18);

$service_url = 'http://api.tripadvisor.com/api/partner/2.0/location/'.$cityCodes[$rand].'/?key=HackTripAdvisor-ade29ff43aed';

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

$str = '{ "fakeCity1": "'.$fakeCity1.'", "fakeCity2": "'.$fakeCity2.'", "fakeCity3": "'.$fakeCity3.'", "realCity": "'.$json['address_obj']['city'].', '.$json['address_obj']['country'].'", "comment": "'.$json['reviews'][3]['text'].'"}';
//$utf8str = iconv(mb_detect_encoding($str, mb_detect_order(), true), "UTF-8", $str);
//echo($utf8str);
echo($str);
?>
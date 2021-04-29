<?php 
$curl =  curl_init();
$url = "https://api.covid19api.com/live/country/pakistan/status/confirmed";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($curl);
if(curl_error($res)){
    echo $res;
}else{
    $data = json_decode($res, true);
    $arry_size = count($data);
    $resp = array_slice($data, -6, 6, true);
    print_r($resp);

}
curl_close($curl);
?>
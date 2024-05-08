<?php


$term = 'Konya';

$url = "https://www.doktortakvimi.com/ara?q=&loc=.$term";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);
preg_match_all('/result-name="([^"]+)"/', $html, $matches);

foreach ($matches[1] as $doctor_name) {
    echo $doctor_name . "<br>";
}
?>
<?php

// aranacak il
$term = 'Konya';

$url = "https://www.doktortakvimi.com/ara?q=&loc=.$term";

// curl kütüphanesi ayarlamaları
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// html sayfasının tümünde aranacak düzenli ifade
preg_match_all('/result-name="([^"]+)"/', $html, $matches);

$doctors = [] ;

// döngü ile doktor isimlerini alıp diziye atıyorum
foreach ($matches[1] as $doctor_name) {

    $doctors[] = ['name' => $doctor_name];

    // echo $doctor_name . "<br>";
}

// json tipine döndürme
$json = json_encode($doctors);


// dosyaya yazırma ve kapatma
$file = fopen("doctors.json", "w") or die("Unable to open file!");
fwrite($file, $json);
fclose($file);



?>
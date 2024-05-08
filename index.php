<?php

// Composer ile yüklenen paketlerin otomatik olarak yüklenebilmesi için gerekli olan autoload.php dosyasını ekler
require 'vendor/autoload.php';

// html'i işlemek için  DomCrawleri dahil ediyoruz.
use Symfony\Component\DomCrawler\Crawler;  


$term = 'Edirne';
$url = "https://www.doktortakvimi.com/ara?q=&loc=$term";

$client = new \GuzzleHttp\Client();

// 3- url den veriyi alıyoruz

$response = $client->request('GET', $url);

$html = ''.$response->getBody();


$crawler = new Crawler($html);  


// 4- döngü ile veriyi döndür
$nodeValues = $crawler->filter('#search-content > li > div')->each(function (Crawler $node, $i) {

    echo $node->html();
});



// 5- istediğin değerdeki veriyi ara


// 6- çıktıyı ekrana yazdırma





?>
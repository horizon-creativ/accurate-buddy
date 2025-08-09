<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Horizondoxa\AccurateBuddy\Core\AccurateClient;
use Horizondoxa\AccurateBuddy\Modules\Item;

$baseUrl = 'https://accurate.accurate.id';
$token = 'aat.NTA.eyJ2IjoxLCJ1Ijo4OTAwMjQsImQiOjE4MjYyMzIsImFpIjo1NTEzNSwiYWsiOiIyNjA4MWNmOS1hYjMzLTQwOWUtYjA1NS1iNTEzMmM2YzM5Y2IiLCJhbiI6IkRNVSBBUEkgSW50ZWdyYXRpb24iLCJhcCI6IjdmZTYyOTU0LTI2MjQtNDhlMy05ZmY3LTRjNTVmOTQxZWY4MiIsInQiOjE3NDU2NDA0MjA4NzF9.LceFIGJKDyil0J+6p8CXzGa6K61zXhSr9CHq5LPkLjeh5KoClJUbXl3vi4URG6JyspYXuDiUj+ino0J/ckb+HEP2y/iQU3Q+qMySVrZumTDCZZdrMrIxrQ5ozMHnuyKBGL/2xNc02KPN88TBxpWT4WFB0uMmI3dmfadfGQvLcwLDvQA2kulIN/aSvq/0/S7xnaRVaV+DRzw=.PpXmNnPQ1ecoXdSagZ2NMu0osHEFoAPNJSo9BBpUjKY';
$signature = '3eMwbKiJUqgpb1BgkwdyfMWKkD0XYoxxXBqG70uPhf4rm9wqj2eZQLNJCko8v24L';

$client = new AccurateClient($token, $signature);
$item = new Item($client);
$params = [
    'fields' => 'id,name,no'
];
// GET LIST
// $list = $item->getList($params);
// print_r($list);

// GET DETAIL
$detail = $item->getDetail(2551);
print_r($detail);

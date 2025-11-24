<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Exception\ClientException;
use Horizondoxa\AccurateBuddy\Core\AccurateClient;
use Horizondoxa\AccurateBuddy\Modules\Item;

// $baseUrl = 'https://accurate.accurate.id';
$token = 'aat.MTUw.eyJ2IjoxLCJ1Ijo5NzYzNjgsImQiOjIwMDU1NTksImFpIjo1ODE3NCwiYWsiOiI5YjE5MWE5Zi1hNTdjLTQwMTctYTZlZS1iNWU5MTBjYzkwY2YiLCJhbiI6IlZlbmRvciBEaXN0cmlidXRpb24iLCJhcCI6IjRkNTAyYjM1LWE2OTYtNGQ0My05YTUyLWY4ZmY5ZjU5NGJiMyIsInQiOjE3NTU0NjMwMzIwMDh9.peuojGbEbUpWqdAtLvWfo5ELteqfjHcdS9ZEVKEzE3uuVryMi80HzL+ivX7UEoESdU8O6o3mpLMeOkYhdSKmU9MnA3w3srjHCZpjqK6VU4Xbf3Asiat3glKdfScmXIZBUDLuA9A6QYdKqa3yzY5y77M69/g9X4PhoooZgUhc/nCPsAB0FBfg0pNpHxdYqgOpixCwuiuZb0Y=.OmSCbkPDXXhTuCgxaGsDL3zjYAHeLr4gs9e7GmzxPbM';
// $token = '';
$signature = 'HjKaOjRu0ZWIeArefDQHVJnzEIeJUxdi1TceMobyUNh9FwQ7iHYGzOM1C9qtzjxJ';

$client = new AccurateClient($token, $signature, 'https://iri.accurate.id/accurate/api/');
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

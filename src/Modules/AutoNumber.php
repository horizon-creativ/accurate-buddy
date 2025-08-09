<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class AutoNumber
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'auto-number';
    }


    /**
     * getList
     * 
     * @param array $params
     * @return array
     */
    public function getList($params)
    {
        return $this->client->request('GET', $this->module . '/list.do', ['query' => $params]);
    }
}

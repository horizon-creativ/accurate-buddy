<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class AccessPrivileges
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'access-privilege';
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

    /**
     * getDetail
     * 
     * @param int $id
     * @return array
     */
    public function getDetail($id)
    {
        return $this->client->request('GET', $this->module . '/detail.do', ['query' => ['id' => $id]]);
    }
}

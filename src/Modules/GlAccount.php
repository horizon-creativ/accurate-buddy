<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class GlAccount
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'glaccount';
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

    /**
     * create
     * 
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->client->request('POST', $this->module . '/save.do', ['json' => $data]);
    }

    /**
     * update
     * 
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update($id, array $data)
    {
        $data['id'] = $id;
        return $this->client->request('POST', $this->module . '/save.do', ['json' => $data]);
    }

    /**
     * delete
     * 
     * @param int $id
     * @return array
     */
    public function delete($id)
    {
        return $this->client->request('POST', $this->module . '/delete.do', ['json' => ['id' => $id]]);
    }

    /**
     * search account balance by date
     * 
     * @param array $params
     * @return array
     */
    public function getBalance($params)
    {
        return $this->client->request('GET', $this->module . '/get-balance.do', ['query' => $params]);
    }

    /**
     * get BS account amount (Neraca)
     * 
     * @param array $params
     * @return array
     */
    public function getBsAccountAmount($params)
    {
        return $this->client->request('GET', $this->module . '/get-bs-account-amount.do', ['query' => $params]);
    }

    /**
     * get pl account amount (Laba Rugi)
     * 
     * @param array $params
     * @return array
     */
    public function getPlAccountAmount($params)
    {
        return $this->client->request('GET', $this->module . '/get-pl-account-amount.do', ['query' => $params]);
    }
}

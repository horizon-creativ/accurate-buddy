<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class SalesQuotation
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'sales-quotation';
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
}

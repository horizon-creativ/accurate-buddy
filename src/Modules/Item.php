<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class Item
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'item';
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
     * deleteItem
     * 
     * @param int $id
     * @return array
     */
    public function delete($id)
    {
        return $this->client->request('POST', $this->module . '/delete.do', ['json' => ['id' => $id]]);
    }

    /**
     * get item cost on certain date
     * 
     * @param array $params
     * @return array
     */
    public function getNearestCost($params)
    {
        return $this->client->request('GET', $this->module . '/get-nearest-cost.do', ['query' => $params]);
    }

    /**
     * get item price and discount
     * 
     * @param array $params
     * @return array
     */
    public function getSellingPrice($params)
    {
        return $this->client->request('GET', $this->module . '/get-selling-price.do', ['query' => $params]);
    }

    /**
     * get item stock
     * 
     * @param array $params
     * @return array
     */
    public function getStock($params)
    {
        return $this->client->request('GET', $this->module . '/get-stock.do', ['query' => $params]);
    }

    /**
     * get available items
     * 
     * @param array $params
     * @return array
     */
    public function getListStock($params)
    {
        return $this->client->request('GET', $this->module . '/list-stock.do', ['query' => $params]);
    }

    /**
     * search items by name or serial number
     * 
     * @param array $params
     * @return array
     */
    public function searchByItemOrSn($params)
    {
        return $this->client->request('GET', $this->module . '/search-by-item-or-sn.do', ['query' => $params]);
    }

    /**
     * search items by upc number / barcode
     * 
     * @param array $params
     * @return array
     */
    public function searchByUpcNumber($params)
    {
        return $this->client->request('GET', $this->module . '/search-by-no-upc.do', ['query' => $params]);
    }

    /**
     * get stock mutation history, olny 7 days history
     * 
     * @param array $params
     * @return array
     */
    public function getStockMutationHistory($params)
    {
        return $this->client->request('GET', $this->module . '/stock-mutation-history.do', ['query' => $params]);
    }

    /**
     * get last item price bought from a vendor
     * 
     * @param array $params
     * @return array
     */
    public function getLastVendorPrice($params)
    {
        return $this->client->request('GET', $this->module . '/vendor-price.do', ['query' => $params]);
    }
}

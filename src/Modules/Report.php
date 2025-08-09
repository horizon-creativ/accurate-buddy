<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class Report
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'report';
    }

    /**
     * get serial number / production by filter
     * 
     * @param array $params
     * @return array
     */
    public function getSerialNumberMutation($params)
    {
        return $this->client->request('GET', $this->module . '/serial-number-mutation.do', ['query' => $params]);
    }

    /**
     * get serial number / production per warehouse
     * 
     * @param array $params
     * @return array
     */
    public function getSerialNumberPerWarehouse($params)
    {
        return $this->client->request('GET', $this->module . '/serial-number-per-warehouse.do', ['query' => $params]);
    }

    /**
     * get stock summary by filter
     * 
     * @param array $params
     * @return array
     */
    public function getMutationSummary($params)
    {
        return $this->client->request('GET', $this->module . '/stock-mutation-summary.do', ['query' => $params]);
    }

    /**
     * get work order detail
     * 
     * @param array $params
     * @return array
     */
    public function getWorkOrderDetail($params)
    {
        return $this->client->request('GET', $this->module . '/work-order-detail.do', ['query' => $params]);
    }
}

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
        return $this->safeRequest('GET', $this->module . '/serial-number-mutation.do', ['query' => $params]);
    }

    /**
     * get serial number / production per warehouse
     * 
     * @param array $params
     * @return array
     */
    public function getSerialNumberPerWarehouse($params)
    {
        return $this->safeRequest('GET', $this->module . '/serial-number-per-warehouse.do', ['query' => $params]);
    }

    /**
     * get stock summary by filter
     * 
     * @param array $params
     * @return array
     */
    public function getMutationSummary($params)
    {
        return $this->safeRequest('GET', $this->module . '/stock-mutation-summary.do', ['query' => $params]);
    }

    /**
     * get work order detail
     * 
     * @param array $params
     * @return array
     */
    public function getWorkOrderDetail($params)
    {
        return $this->safeRequest('GET', $this->module . '/work-order-detail.do', ['query' => $params]);
    }

    private function safeRequest($method, $endpoint, $options = [])
    {
        try {
            return $this->client->request($method, $endpoint, $options);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return $this->formatException($e);
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            return $this->formatException($e);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return $this->formatException($e);
        } catch (\Throwable $e) {
            // LAST DEFENSE – menangkap semua error fatal
            return [
                's' => false,
                'd'   => [$e->getMessage()],
            ];
        }
    }

    private function formatException($e)
    {
        $status = $e->hasResponse()
            ? $e->getResponse()->getStatusCode()
            : null;

        $body = $e->hasResponse()
            ? json_decode($e->getResponse()->getBody()->getContents(), true)
            : null;

        return [
            's' => false,
            'd'   => [$e],
        ];
    }
}

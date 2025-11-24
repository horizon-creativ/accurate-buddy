<?php

namespace Horizondoxa\AccurateBuddy\Modules;

use Horizondoxa\AccurateBuddy\Core\AccurateClient;

class Tax
{
    protected $client;
    protected $module;

    public function __construct(AccurateClient $accurateClient)
    {
        $this->client = $accurateClient;
        $this->module = 'tax';
    }

    /**
     * getList
     * 
     * @param array $params
     * @return array
     */
    public function getList($params)
    {
        return $this->safeRequest('GET', $this->module . '/list.do', ['query' => $params]);
    }

    /**
     * getDetail
     * 
     * @param int $id
     * @return array
     */
    public function getDetail($id)
    {
        return $this->safeRequest('GET', $this->module . '/detail.do', ['query' => ['id' => $id]]);
    }

    /**
     * create
     * 
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->safeRequest('POST', $this->module . '/save.do', ['json' => $data]);
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
        return $this->safeRequest('POST', $this->module . '/save.do', ['json' => $data]);
    }

    /**
     * delete
     * 
     * @param int $id
     * @return array
     */
    public function delete($id)
    {
        return $this->safeRequest('POST', $this->module . '/delete.do', ['json' => ['id' => $id]]);
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

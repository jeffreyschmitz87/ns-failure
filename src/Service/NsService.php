<?php

namespace App\Service;

use App\Entity\Station;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package App\Service
 */
class NsService
{
    const BASE_URL = 'http://webservices.ns.nl';

    const NODE_STATIONS = 'stations';

    const NODES = [
        self::NODE_STATIONS => 'ns-api-stations-v2',
    ];

    /**
     * @var object|null
     */
    protected $results;

    /**
     * @var array
     */
    protected $authentication = [];

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->authentication = [
            $username,
            $password
        ];
    }

    /**
     * @param string $node
     * @return array
     */
    public function fetch($node)
    {
        try {
            $this->sendRequest(self::NODES[$node]);

            $service = 'map' . ucfirst($node);
            $data = $this->$service();
        } catch (GuzzleException $e) {
            echo $e->getMessage();
            exit;
        }

        return $data ?? [];
    }

    /**
     * @return array
     */
    protected function mapStations()
    {
        $stations = [];
        foreach ($this->results->Station as $stationObject) {
            $station = new Station();
            $station->setCode($stationObject->Code);
            $station->setType($stationObject->Type);
            $station->setNameShort($stationObject->Namen->Kort);
            $station->setNameMiddle($stationObject->Namen->Middel);
            $station->setNameLong($stationObject->Namen->Lang);
            $station->setCountry($stationObject->Land);
            $station->setUicCode((int) $stationObject->UICCode);
            $station->setLatitude((float) $stationObject->Lat);
            $station->setLongitude((float) $stationObject->Lon);

            $synonyms = [];
            foreach ($stationObject->Synoniemen->Synoniem as $synonym) {
                $synonyms[] = $synonym;
            }

            $station->setSynonyms($synonyms);

            $stations[] = $station;
        }

        return $stations;
    }

    /**
     * @param string $node
     * @param string $requestMethod
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function sendRequest($node, $requestMethod = Request::METHOD_GET)
    {
        $response = (new Client)->request($requestMethod, self::BASE_URL . '/' . $node, [
            RequestOptions::AUTH => $this->authentication,
        ]);

        $this->results = simplexml_load_string($response->getBody()->getContents());
    }
}

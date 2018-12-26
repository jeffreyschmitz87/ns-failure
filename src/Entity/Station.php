<?php

namespace App\Entity;

/**
 * @package App\Entity
 */
class Station
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $nameShort;

    /**
     * @var string
     */
    protected $nameMiddle;

    /**
     * @var string
     */
    protected $nameLong;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var int
     */
    protected $uicCode;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var array
     */
    protected $synonyms = [];

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getNameShort()
    {
        return $this->nameShort;
    }

    /**
     * @param string $nameShort
     */
    public function setNameShort(string $nameShort)
    {
        $this->nameShort = $nameShort;
    }

    /**
     * @return string
     */
    public function getNameMiddle()
    {
        return $this->nameMiddle;
    }

    /**
     * @param string $nameMiddle
     */
    public function setNameMiddle(string $nameMiddle)
    {
        $this->nameMiddle = $nameMiddle;
    }

    /**
     * @return string
     */
    public function getNameLong()
    {
        return $this->nameLong;
    }

    /**
     * @param string $nameLong
     */
    public function setNameLong(string $nameLong)
    {
        $this->nameLong = $nameLong;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getUicCode()
    {
        return $this->uicCode;
    }

    /**
     * @param int $uicCode
     */
    public function setUicCode(int $uicCode)
    {
        $this->uicCode = $uicCode;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return array
     */
    public function getSynonyms()
    {
        return $this->synonyms;
    }

    /**
     * @param array $synonyms
     */
    public function setSynonyms(array $synonyms)
    {
        $this->synonyms = $synonyms;
    }
}

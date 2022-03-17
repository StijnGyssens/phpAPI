<?php


class CityLoader
{
    private $rows;
    private $curlLoader;

    public function __construct($rows,CurlLoader $curlLoader)
    {
        $this->rows = $rows;
        $this->curlLoader= $curlLoader;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        $city= $this->createCityFromData($this->rows);
        return $city;
    }

    /**
     * @param $data
     * @return City
     */
    private function createCityFromData($data)
    {
        $city = new City();
        $city->setImgId($data['img_id']);
        $city->setImgTitle($data['img_title']);
        $city->setImgFilename($data['img_filename']);
        $city->setImgHeight($data['img_height']);
        $city->setImgWidth($data['img_width']);
        $city->setImgLanId($data['img_lan_id']);
        $city->setWeather($data["img_weather_location"],$this->curlLoader);
        return $city;
    }

}
<?php

class City
{
    private $img_id;
    private $img_filename;
    private $img_title;
    private $img_width;
    private $img_height;
    private $img_lan_id;
    private $weather;

    /**
     * @return int
     */
    public function getImgId(): int
    {
        return $this->img_id;
    }

    /**
     * @param int $img_id
     */
    public function setImgId(int $img_id): void
    {
        $this->img_id = $img_id;
    }

    /**
     * @return string
     */
    public function getImgFilename(): string
    {
        return $this->img_filename;
    }

    /**
     * @param string $img_filename
     */
    public function setImgFilename(string $img_filename): void
    {
        $this->img_filename = $img_filename;
    }

    /**
     * @return string
     */
    public function getImgTitle(): string
    {
        return strtoupper($this->img_title);
    }

    /**
     * @param string $img_title
     */
    public function setImgTitle(string $img_title): void
    {
        $this->img_title = $img_title;
    }

    /**
     * @return int
     */
    public function getImgWidth(): int
    {
        return $this->img_width;
    }

    /**
     * @param int $img_width
     */
    public function setImgWidth(int $img_width): void
    {
        $this->img_width = $img_width;
    }

    /**
     * @return int
     */
    public function getImgHeight(): int
    {
        return $this->img_height;
    }

    /**
     * @param int $img_height
     */
    public function setImgHeight(int $img_height): void
    {
        $this->img_height = $img_height;
    }

    /**
     * @return int
     */
    public function getImgLanId(): int
    {
        return $this->img_lan_id;
    }

    /**
     * @param int $img_lan_id
     */
    public function setImgLanId(int $img_lan_id): void
    {
        $this->img_lan_id = $img_lan_id;
    }

    public function getArray()
    {
        $array = [];
        foreach ($this as $key=>$value)
        {
            $array[$key]=$value;
        }
        return $array;
    }


    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @param string $img_weather_location
     */
    public function setWeather(string $img_weather_location, CurlLoader $curlLoader): void
    {
        $city_weather=$curlLoader->getCurl($img_weather_location,"nl");
        $cloud = $city_weather["weather"][0]["description"];
        $temp = $city_weather["main"]["temp"];
        $humidity = $city_weather["main"]["humidity"];
        $this->weather = "Weer: $cloud, $temp °C, vochtigheid $humidity %";
    }


}
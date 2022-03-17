<?php

class CurlLoader
{
    private $baseUrl;
    private $key;

    public function __construct(string $baseUrl,string $key)
    {
        $this->baseUrl=$baseUrl;
        $this->key=$key;
    }

    /**
     * @param string $city
     * @param string $lang
     * @return bool|string
     */
    public function getCurl(string $city,string $lang)
    {
        $url="$this->baseUrl?q=$city&lang=$lang&units=metric&appid=$this->key";
        $curl = curl_init( $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        $response= curl_exec( $curl );
        curl_close($curl);
        return JSON_DECODE($response,true);;
    }
}
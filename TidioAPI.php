<?php

/*
  TidioOneAPI class is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.

  TidioOneAPI class is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
 */

/**
 * Class for handy use of Tidio Api in PHP.
 * More details at:  http://tidio.co/en/docs
 *
 * @author Tidio Ltd
 * @example:

$visitor = array(
    '_email' => 'example@example.net'
);
$data = array(
    "_first_name" => "1"
);
$tidio = new TidioAPI('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', $visitor);
$tidio->call('visitor', $data);

 */
class TidioAPI {

    /**
     * Project public key to use it with every request.
     * @var array
     */
    private $public_key = '';

    /**
     * Array or string with visitor details to identify. 
     * It can be visitorId or other details which allow us to detect who is on our site.
     * @var array
     */
    private $visitor = array();
    private $default_data = array();
    private $endpoint = 'https://api.tidio.co/';

    /**
     * Initialization of API class. Please give it params propor values
     * to make proper request in methods below.
     * 
     * @param string$public_key
     * @param string|array $visitor
     * @return array Response from the server.
     */
    public function __construct($public_key, $visitor) {
        if (!isset($public_key) || !is_string($public_key)) {
            return false;
        }

        if (!isset($visitor)) {
            return false;
        } elseif (is_string($visitor) && strlen($visitor) != 32) {
            return false;
        }

        $this->default_data = array(
            'projectPublicKey' => $this->public_key,
        );
        if (is_string($visitor)) {
            $this->default_data['visitorId'] = $visitor;
        } elseif (is_array($visitor)) {
            $this->default_data['visitorIdentify'] = $visitor;
        }

        $this->public_key = $public_key;
        $this->visitor = $visitor;
    }

    /**
     * Make an remote call to Tidio server
     * @param string $action 'tarck' for example
     * @param array $params Extra data required for used method
     * @return array
     */
    public function call($action, $params = null) {

        if ($params && is_array($params)) {
            $params = array_merge($this->default_data, $params);
            $url = $this->endpoint . '/' . $url . '?data=' . base64_encode(json_encode($params));
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data);
    }

}

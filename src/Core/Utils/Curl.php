<?php

namespace Halofina\Core\Utils;
use Halofina\Core\Exception;

abstract class Curl {
    /**
     * @param       $url
     * @param array $data
     *
     * @param null  $header
     *
     * @return array|mixed
     */

    const GET = 'GET';
    const POST = 'POST';

    /** @noinspection MoreThanThreeArgumentsInspection */
    /**
     * @param             $url
     * @param array|null $data
     * @param array|null $header
     * @param string|null $method
     *
     * @return array|mixed
     * @throws Exception
     */
    public static function connect($url, $data, $header = NULL, $method = NULL) {
        if ($method === NULL) {
            $method = self::GET;
        }
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 400);
        curl_setopt($ch, CURLOPT_VERBOSE, FALSE);

        if ($header !== NULL) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            if ($data !== NULL) {
                $postFields = json_encode($data, JSON_FORCE_OBJECT);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            }
        } else if ($method === 'GET') {
            curl_setopt($ch, CURLOPT_POST, FALSE);
            if ($data !== NULL && \count($data)>0) {
                $url = $url . '?' . http_build_query($data);
            }
        }

        curl_setopt($ch, CURLOPT_URL, $url);

        // send request
        $response = curl_exec($ch);

        if ($response === FALSE) {
            throw new Exception('curl error (' . curl_errno($ch) . '): ' . htmlspecialchars(curl_error($ch)));
        }

        // close connection
        curl_close($ch);

        $json_response = json_decode($response, TRUE);
        if ($json_response !== NULL) {
            if (!isset($json_response['s'])) {
                $json_response = [
                    's' => 200,
                    'd' => $json_response
                ];
            }

            if ($json_response['s'] !== 200) {
                throw new Exception((isset($json_response['m']) ? $json_response['m']:''), $json_response['s'], $json_response['d']);
            }
            return $json_response;
        }
        return [
            's' => 200,
            'd' => $response
        ];
    }
}